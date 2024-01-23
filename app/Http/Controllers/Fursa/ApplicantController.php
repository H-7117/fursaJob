<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fursa\FursaApplicant;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJob;
use App\Models\Fursa\FursaJobApplcation;
use App\Models\Fursa\jobStage;
use App\Services\File\FileService;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{


    public function index()
    {


        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id', $company)->get();
        // return $depertments;
        $job_depertments = [];
        foreach ($depertments as $depertment) {
            $job_depertments[] = $jobs = FursaJob::where('depertment_id', $depertment->id)->get();
        }

        $jobApplcation = [];
        foreach ($job_depertments as  $job) {
            foreach ($job as $jobs) {

                $jobApplcation[] = FursaJobApplcation::where('job_id', $jobs->id)->get();
            }
        }
        // return $jobApplcation;
        $jobApplicant = [];
        foreach ($jobApplcation as  $applicants) {
            foreach ($applicants as $applicant) {
                // return $jobApplicant;
                // $jobApplicant[] =FursaApplicant::where('job_application_id',$applicant->id)->get();
                $jobApplicant[] = DB::table('fursa__applicants')
                    ->join('fursa__job_applcations', 'fursa__applicants.job_application_id', '=', 'fursa__job_applcations.id')
                    ->join('fursa__jobs', 'fursa__job_applcations.job_id', '=', 'fursa__jobs.id')
                    ->select('fursa__applicants.*', 'fursa__jobs.label')
                    ->where('fursa__job_applcations.id', $applicant->id)
                    ->paginate(2);
            }
        }


        return view('back.fursa.applicants.index', compact('jobApplicant'));
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
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvExtension = $cvFile->getClientOriginalExtension();
            $cvFileName = 'cv_' . time() . '.' . $cvExtension;
            $cvPath = $cvFile->storeAs('cv_folder', $cvFileName, 'public');
        } else {
            $cvPath = null; 
        }


        $jobApplicationId = $request->jobApplcationId;
        $existingApplicant = FursaApplicant::where('job_application_id', $jobApplicationId)
            ->where('personalEmail', $request->personalEmail)
            ->first();

        if ($existingApplicant !== null) {
            return back()->withErrors('Email already exists for this job application');
        }

        
        $applicant = FursaApplicant::create([
            'user_id' => Auth::user()->id,
            'job_application_id' => $request->jobApplcationId,
            'name' => $request->name,
            'phone' => $request->phone,
            'personalEmail' => $request->personalEmail,
            'links' => $request->links,
            'cv' => $cvPath
        ]);


        $applicant->save();
        $jobStsges = ['job_id' => $request->job_id, 'name' => 'متقدم', 'round' => 1, 'fursa__applicant_id' => $applicant->id];
        jobStage::create($jobStsges);
        // $applcantStage = ['fursa__applicant_id'=> Auth::user()->id , 'job_stage_id'=>1];    
        return redirect()->route('home.front');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $applicants = FursaApplicant::findOrFail($id);
        return view('back.Fursa.applicants.view', compact('applicants'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
