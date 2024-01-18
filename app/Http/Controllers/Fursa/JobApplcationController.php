<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJob;
use App\Services\Fursa\JobApplcationService;
use Illuminate\Http\Request;
use App\Models\Fursa\FursaJobApplcation;
use Illuminate\Support\Facades\DB;

class JobApplcationController extends Controller
{
    public function __construct(private JobApplcationService $jobApplcationService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id',$company)->get();
        // return $depertments;
        $job_depertments = [];
        foreach($depertments as $depertment){
            $job_depertments[] = $jobs = FursaJob::where('depertment_id',$depertment->id)->get();
        }

        $jobApplcation = [];
        foreach($job_depertments as  $job){
            foreach($job as $jobs){

                $jobApplcation[] =FursaJobApplcation::where('job_id',$jobs->id)->paginate(2);
            }
        }

        // return $jobApplcation;
        
        return view('back.Fursa.job.jobApplication.index',compact('jobApplcation'));
        
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
        if (!$this->jobApplcationService->store($request)) {
            return redirect()->route('companiesJob.index')->withSuccess('تم انشاء وظيفه بنجاح');
        }
        
        return redirect()->back()->withErrors('لم تتم عمليه الحفظ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

        $companyName = DB::select("
        SELECT
        fursa__companies.*
      FROM
        fursa__job_applcations
        INNER JOIN fursa__jobs  ON fursa__job_applcations.job_id = fursa__jobs.id
        INNER JOIN fursa__depertments  ON fursa__jobs.depertment_id = fursa__depertments.id
        INNER JOIN fursa__companies ON fursa__companies.id = fursa__depertments.company_id
      WHERE
        fursa__job_applcations.id = $id;
        ");

        // return $companyName;
        $jobApplcation =FursaJobApplcation::findOrFail($id);
        
        return view('back.Fursa.job.jobApplication.view',compact('jobApplcation','companyName'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $jobApplcation = $this->jobApplcationService->getById($id);
        return view('back.Fursa.job.jobApplication.update',compact('jobApplcation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (!$this->jobApplcationService->update($request,$id)) {
            return redirect()->route('jobApplication.index');
        }
        return redirect()->back()->withErrors('لم تتم عمليه التعديل');
    }

        public function delete($id){
            $jobApplcation = $this->jobApplcationService->getById($id);
            return view('job.jobApplication.delete',compact('jobApplcation'));
        }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if (!$this->jobApplcationService->destory($id)) {
            return redirect()->route('jobApplication.index');
            }
            return redirect()->back()->withErrors('لم تتم عمليه الحذف');
    }
}
