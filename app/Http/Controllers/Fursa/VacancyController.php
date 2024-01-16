<?php

namespace App\Http\Controllers\Fursa;

use App\Http\Controllers\Controller;
use App\Models\Fursa\vacancy;
use Illuminate\Http\Request;
use App\Models\Fursa\job;
use App\Models\Fursa\JobStage;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vacancy = vacancy::all();
        
        return view('vacancies.index',compact('vacancy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jobs = job::all();
        return view('vacancies.add',compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        vacancy::create(
            [
                'jobs_id' => $request->jobs_id,
                'number_of_applicants' => $request->number_of_applicants,
                'jobState'=> $request->jobState
      
            ]
        );
 
    return redirect()->route('companyVacancies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $vacancy = vacancy::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $vacancy = vacancy::findOrFail($id);
        $jobs = job::all();
        return view('vacancies.edit',compact('vacancy','jobs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $vacancy = vacancy::findOrFail($id);
        $vacancy->update(
            [
                'jobs_id' => $request->jobs_id,
                'number_of_applicants' => $request->number_of_applicants,
                'jobState'=> $request->jobState
            ]
        );
        return redirect()->route('companyVacancies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
