<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\Fursa\FursaApplicant;
use App\Models\Fursa\FursaCompany;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJob;
use App\Models\Fursa\FursaJobApplcation;
use App\Models\Fursa\jobStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class WorkFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $companyId = AccountFacade::getTenantId();

    //     $data = DB::table('fursa__companies')
    //         ->join('fursa__depertments', 'fursa__companies.id', '=', 'fursa__depertments.company_id')
    //         ->join('fursa__jobs', 'fursa__depertments.id', '=', 'fursa__jobs.depertment_id')
    //         ->join('job_stages', 'fursa__jobs.id', '=', 'job_stages.job_id')
    //         ->select(
    //             'fursa__companies.id as company_id',
    //              'fursa__companies.name as company_name', 
    //           'fursa__depertments.id as department_id',
    //            'fursa__depertments.name as department_name', 
    //           'fursa__jobs.id as job_id',
    //            'fursa__jobs.name as job_name', 
    //           'job_stages.name as stage_name',
    //          DB::raw('COUNT(job_stages.name) as name_count'))
    //         ->where('fursa__companies.id', $companyId)
    //         ->groupBy('fursa__companies.id', 'fursa__companies.name', 'fursa__depertments.id', 'fursa__depertments.name', 'fursa__jobs.id', 'fursa__jobs.name', 'job_stages.name')
    //         ->get();
    //    return $data;
        // $company = AccountFacade::getTenantId();
        // $depertments = FursaDepertment::where('company_id',$company)->get();
        
        
        // $jobs = FursaJob::where('depertment_id',$depertments[0]->id)->get();

        // $jobApplcation =FursaJobApplcation::where('job_id',$jobs[0]->id)->get();
        // $id =  $jobApplcation[0]->id;
        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id',$company)->get();
        // return $depertments;
        $job_depertments = [];
        foreach($depertments as $depertment){
            $job_depertments[] = $jobs = FursaJob::where('depertment_id',$depertment->id)->get();
        }

     
        
        // return $jobs[0]->id;
        // $jobStages= jobStage::where('job_id',$jobs[0]->id)->get();
        // $jobs = FursaJob::with('stages')->get();
        // return $jobs;
        return view('back.Fursa.WorkFlow.index',compact('job_depertments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
                 
    $jobStages = JobStage::where('job_id', $id)->get();
    
    
    $uniqueNames = [];
    
    
    foreach ($jobStages as $jobStage) {
        $name = $jobStage->name;
        $applicantId = $jobStage->fursa__applicant_id;
        
        
        if (!array_key_exists($name, $uniqueNames)) {
            $uniqueNames[$name] = [];
        }
        
       
        $applicantData = FursaApplicant::find($applicantId);
        
       
        $uniqueNames[$name][] = $applicantData;
    }
    
       return view('back.Fursa.WorkFlow.view', ['uniqueNames' => $uniqueNames]);
        
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $applocant_id = $request->all();  

        foreach($applocant_id as $key => $value){
            if ( Str::startsWith($key, 'applicant')) {
                $applicants = explode('_',$key)[1];
            
                $jobStages = JobStage::where('fursa__applicant_id', $applicants)->get();

                foreach ($jobStages as $jobStage) {
                    $nextRound = $jobStage->round + 1;

                    $nextJobStage = JobStage::where('job_id', $jobStage->job_id)
                                            ->where('round', $nextRound)
                                            ->first();

                    if ($nextJobStage) {
                        $nextStageName = $nextJobStage->name;
                        $jobStage->update(['name' => $nextStageName, 'round' => $nextRound]);
                    }
                }

            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
