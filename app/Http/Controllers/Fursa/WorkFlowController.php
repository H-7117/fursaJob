<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MaillController;
use App\Models\Fursa\FursaApplicant;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJob;
use App\Models\Fursa\jobStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class WorkFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $companyId = AccountFacade::getTenantId();

  
        // $id =  $jobApplcation[0]->id;
        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id',$company)->get();
        // return $depertments;
        $job_depertments = [];
        foreach($depertments as $depertment){
            $job_depertments[] = $jobs = FursaJob::where('depertment_id',$depertment->id)->get();
        }

     
        
        
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

        if ($request->update == 'upgrade') {
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
                    Session::put('applicants', $applicants); 

                    return redirect()->action([MaillController::class, 'index']);
                }
            }
        }
            

            if ($request->reject == 'clicked') {
                foreach ($applocant_id as $key => $value) {
                    if (Str::startsWith($key, 'applicant')) {
                        $applicants = explode('_', $key)[1];
            
                        $jobStages = JobStage::where('fursa__applicant_id', $applicants)->get();
            
                        foreach ($jobStages as $jobStage) {
                            $nextStageName = 'مرفوض';
                            $nextRound = $jobStage->round;
            
                            $jobStage->update(['name' => $nextStageName, 'round' => $nextRound]);
                        }
                        Session::put('applicants', $applicants); 

                        return redirect()->action([MaillController::class, 'index']);
                    }
                    
                }
            }
        
        return redirect()->back()->withErrors("error");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
