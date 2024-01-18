<?php

namespace App\Http\Controllers\Fursa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaCompany;
use App\Models\Fursa\FursaJob;
use App\Models\Fursa\FursaJobApplcation;

class JobPostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
     
        $category = $request->input('Category');
        $location = $request->input('Location');
        $jobTitle = $request->input('label');
        
        $jobs = FursaJob::select(
                'fursa__jobs.*',
                'fursa__depertments.id as department_id',
                'fursa__depertments.name as department_name',
                'fursa__depertments.label as department_label',
                'fursa__companies.id as company_id',
                'fursa__companies.name as company_name',
                'fursa__companies.label as company_label',
                'fursa__companies.logo as company_logo'
            )
            ->join('fursa__depertments', 'fursa__depertments.id', '=', 'fursa__jobs.depertment_id')
            ->join('fursa__companies', 'fursa__companies.id', '=', 'fursa__depertments.company_id')
            ->whereColumn('fursa__depertments.id', '=', 'fursa__jobs.depertment_id');
        
        if ($category) {
            $jobs->where('fursa__jobs.Category', $category);
        }
        
        if ($location) {
            $jobs->where('fursa__jobs.Location', '=', $location);
        }
        
        if ($jobTitle) {
            $jobs->where('fursa__jobs.label', 'like', '%' . $jobTitle . '%');
        }
        
        $jobs = $jobs->get();
        return view("front.jobPosting", compact("jobs"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
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
        
        $jobApplcation =FursaJobApplcation::findOrFail($id);
        // $jobApplcation = FursaJobApplcation::find($id);
        return view('back.Fursa.job.jobApplication.view',compact('jobApplcation','companyName'));
        // $jobApplcation =FursaJobApplcation::all();
        // return view()
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
    $job = FursaJob::select(
            'fursa__jobs.*',
            'fursa__depertments.id as department_id',
            'fursa__depertments.name as department_name',
            'fursa__depertments.label as department_label',
            'fursa__companies.id as company_id',
            'fursa__companies.name as company_name',
            'fursa__companies.label as company_label',
            'fursa__companies.logo as company_logo'
        )
        ->join('fursa__depertments', 'fursa__depertments.id', '=', 'fursa__jobs.depertment_id')
        ->join('fursa__companies', 'fursa__companies.id', '=', 'fursa__depertments.company_id')
        ->where('fursa__jobs.id', '=', $id)
        ->first();
// return $job;

        return view('front.jobview',compact('job'));

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
