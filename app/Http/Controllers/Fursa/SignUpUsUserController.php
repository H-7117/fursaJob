<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SignUpUsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('front.account.signup');
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
        $username =  $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password'); 
        $tenant = AccountFacade::signUp($username, $email, $password);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function view(){
        $id = Auth::id();
        $jobStages = DB::table('job_stages')
        ->join('fursa__jobs', 'job_stages.job_id', '=', 'fursa__jobs.id')
        ->join('fursa__applicants', 'fursa__applicants.id', '=', 'job_stages.fursa__applicant_id')
        ->select('job_stages.name as job_stage_name', 'fursa__jobs.name as fursa_job_name')
        ->where('fursa__applicants.user_id', '=', $id)
        ->get();
        
        return view('back.Fursa.user.index',['jobStages' => $jobStages]);
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
