<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJob;
use App\Models\Fursa\job;
use App\Services\Fursa\JobStageService;
use Illuminate\Http\Request;
use App\Models\Fursa\JobStage;
use Illuminate\Support\Facades\DB;

class JobStageController extends Controller
{

    // public function __construct(private JobStageService $jobStageService)
    // {
        
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //   $applicants = DB::table('fursa__applicants')
        // ->join('fursa__job_applcations', 'fursa__applicants.job_application_id', '=', 'fursa__job_applcations.id')
        // ->join('fursa__jobs', 'fursa__job_applcations.job_id', '=', 'fursa__jobs.id')
        // ->select('fursa__applicants.*', 'fursa__jobs.label')
        // ->get();
        // return $applicants;

        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id',$company)->get();
        // return $depertments;
        $job_depertments = [];
        foreach($depertments as $depertment){
            $job_depertments[] = $jobs = FursaJob::where('depertment_id',$depertment->id)->get();
        }

        $JobStage = [];
        foreach($job_depertments as  $job){
            foreach($job as $jobs){
                $JobStage[] = JobStage::where('job_id',$jobs->id)->get();
               
            }
        }

        // return $JobStage;

        // $JobStage = JobStage::where('job_id',$jobs[0]->id)->get();
        
        return view('back.fursa.jobstage.index',compact('JobStage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $applicants = DB::table('fursa__applicants')
        // ->join('fursa__job_applcations', 'fursa__applicants.job_application_id', '=', 'fursa__job_applcations.id')
        // ->join('fursa__jobs', 'fursa__job_applcations.job_id', '=', 'fursa__jobs.id')
        // ->select('fursa__applicants.*', 'fursa__jobs.label')
        // ->get();
        // return $applicants;
        $job = FursaJob::all();
        return view('back.fursa.jobstage.create',compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $data = $request->validate([
            'job_id' => 'required',
            'inputs.*.name' => 'required',
            'inputs.*.round' => 'required|numeric',
        ]);
    
        foreach ($request->inputs as $key => $value) {
            $value['job_id'] = $request->job_id;
            JobStage::create($value);
        }
        return redirect()->route('jobStage.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // //
     
        // $jobStage = JobStage::findOrFail($id);
        // return view('job.jobStage.view',compact('jobStage'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        // //
        // $jobstage= $this->jobStageService->getById($id);
        // return view('job.jobStage.update',compact('jobstage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // if (!$this->jobStageService->update($request,$id)) {
        //     return redirect()->route('stage.index');
        // }
        // return redirect()->back()->withErrors('لم تتم عمليه التعديل');

    }

    public function delete($id){
        // $jobstage= $this->jobStageService->getById($id);
        // return view('job.jobStage.delete',compact('jobstage'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // //
        // if (!$this->jobStageService->destory($id)) {
        //     return redirect()->route('stage.index');
        //     }
        //     return redirect()->back()->withErrors('لم تتم عمليه الحذف');

    }
}
