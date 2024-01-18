<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\Fursa\FursaDepertment;
use Illuminate\Http\Request;
use App\Models\Fursa\FursaJob;
use App\Services\Fursa\JobService;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private JobService $jobService)
    {
        
    }
    public function index()
    {
        //
        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id',$company)->get();
        // return $depertments;
        $job_depertments = [];
        foreach($depertments as $depertment){
            $job_depertments[] = $jobs = FursaJob::where('depertment_id',$depertment->id)->paginate(2);
        }
    //    return $job_depertments;
        return view('back.Fursa.job.index',compact('job_depertments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $company = AccountFacade::getTenantId();
        
        $jobs = FursaJob::all();
        $depertment = FursaDepertment::where('company_id',$company)->get();
        
        return view('back.Fursa.job.add',compact('jobs','depertment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $job_id = $this->jobService->store($request);
        if ($job_id) {
            // dd($job_id);
            return view('back.Fursa.job.jobApplication',compact('job_id'));
        }else{
            return redirect()->back()->withErrors('لم تتم عميله حفظ الوظيفه بنجاح');
        }
     
    return redirect()->route('companiesJob.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $job = FursaJob::findOrFail($id);
        return view('back.Fursa.job.view',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $jobs = FursaJob::findOrFail($id);
        $depertments = FursaDepertment::all();
        return view('back.Fursa.job.edit',compact('jobs','depertments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $job = FursaJob::findOrFail($id);
        $job->update(
            [
                'label' => $request->label,
                'name' => $request->name,
                'job_description' => $request->job_description,
                'job_type'=> $request->job_type,
                'Location'=> $request->Location,
                'depertment_id'=> $request->depertment_id
            ]
        );
        return redirect()->route('companiesJob.index');
    }

    public function delete(string $id){
        $job = FursaJob::find($id);
        return view('back.Fursa.job.delete', compact('job'));

     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $job = FursaJob::findOrFail($id);
        $job->delete();
        return redirect()->route('companiesJob.index');
    }
}
