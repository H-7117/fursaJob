<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\Account\AccountFacade;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJob;
use App\Models\Fursa\FursaJobApplcation;
use App\Models\Fursa\jobStage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
        
        return view("back.dashboard.user"); 
    }

    public function dashboardPlatform(){
        return view("back.dashboard.platform"); 

    }

    public function dashboardTanant(){
        
        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id', $company)->get();
        
        $jobs_count = 0;
        
        foreach ($depertments as $depertment) {
            $jobs_count += FursaJob::where('depertment_id', $depertment->id)->count();
        }
        
// =====================================================

        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id', $company)->get();
        
        $jobsState_count = 0;
        
        foreach ($depertments as $depertment) {
            $jobsState_count += FursaJob::where('depertment_id', $depertment->id)->where('status',1)->count();
        }
      
        // =======================================================================
            $company = AccountFacade::getTenantId();
            $depertments = FursaDepertment::where('company_id', $company)->get();
            $job_depertments = [];
            foreach ($depertments as $depertment) {
                $job_depertments[] = $jobs = FursaJob::where('depertment_id', $depertment->id)->get();
            }
            
            $jobApplcation = [];
            foreach ($job_depertments as $job) {
                foreach ($job as $jobs) {
                    $jobApplcation[] = FursaJobApplcation::where('job_id', $jobs->id)->get();
                }
            }
            
            $jobApplicant = [];
            foreach ($jobApplcation as $applicants) {
                foreach ($applicants as $applicant) {
                    $applicants = DB::table('fursa__applicants')
                        ->join('fursa__job_applcations', 'fursa__applicants.job_application_id', '=', 'fursa__job_applcations.id')
                        ->join('fursa__jobs', 'fursa__job_applcations.job_id', '=', 'fursa__jobs.id')
                        ->select('fursa__applicants.*', 'fursa__jobs.label')
                        ->where('fursa__job_applcations.id', $applicant->id)
                        ->get();
                        
                    $jobApplicant = array_merge($jobApplicant, $applicants->toArray());
                }
            }
            
            $countApplcatnt = count($jobApplicant);
 
// ////////////////////////////////////////////////
        
$company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id',$company)->get();


        $job_depertments = [];
        foreach ($depertments as $depertment) {
            $jobs = FursaJob::where('depertment_id', $depertment->id)
                ->orderBy('created_at', 'desc')
                ->get();
        
            $job_depertments[] = $jobs;

            
        }

        // return $job_depertments;
        // =====================================================================================================================

        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id', $company)->get();
        // return $depertments;
        $job_depertments = [];
        foreach ($depertments as $depertment) {
            $job_depertments[] = $jobs = FursaJob::where('depertment_id', $depertment->id)->get();
        }

        $categoryCount = [];

            foreach ($job_depertments as $job) {
                foreach ($job as $jobs) {
                    $categoryId = $jobs->Category;
                
                    if (!isset($categoryCount[$categoryId])) {
                        $categoryCount[$categoryId] = [
                            'count' => 0,
                            'name' => $jobs->Category
                        ];
                    }
                
                    $categoryCount[$categoryId]['count']++;
                }
            }
            
            
        // return $jobApplcation;
        $jobApplicant = [];
        foreach ($jobApplcation as $applicants) {
            $latestApplicant = $applicants->sortByDesc('created_at')->first();
            if ($latestApplicant) {
                $jobApplicant[] = DB::table('fursa__applicants')
                    ->join('fursa__job_applcations', 'fursa__applicants.job_application_id', '=', 'fursa__job_applcations.id')
                    ->join('fursa__jobs', 'fursa__job_applcations.job_id', '=', 'fursa__jobs.id')
                    ->select('fursa__applicants.*', 'fursa__jobs.label')
                    ->where('fursa__job_applcations.id', $latestApplicant->id)
                    ->get();
            }
        }
// ///////////////////////////////////
$company = AccountFacade::getTenantId();
            $depertments = FursaDepertment::where('company_id', $company)->get();
            $job_depertments = [];
            foreach ($depertments as $depertment) {
                $job_depertments[] = $jobs = FursaJob::where('depertment_id', $depertment->id)->get();
            }
            
            $jobApplcation = [];
            foreach ($job_depertments as $job) {
                foreach ($job as $jobs) {
                    $jobApplcation[] = FursaJobApplcation::where('job_id', $jobs->id)->get();
                }
            }
            
            $jobApplicantFials = [];
            foreach ($jobApplcation as $applicants) {
                foreach ($applicants as $applicant) {
                    $applicants = DB::table('fursa__applicants')
                        ->join('fursa__job_applcations', 'fursa__applicants.job_application_id', '=', 'fursa__job_applcations.id')
                        ->join('fursa__jobs', 'fursa__job_applcations.job_id', '=', 'fursa__jobs.id')
                        ->select('fursa__applicants.*', 'fursa__jobs.label')
                        ->where('fursa__job_applcations.name', 'مرفوض')
                        ->where('fursa__job_applcations.id', $applicant->id)
                        ->get();
                        
                    $jobApplicantFials = array_merge($jobApplicantFials, $applicants->toArray());
                }
            }
            
            $countApplcatntCount = count($jobApplicantFials);
            
        
        
        return view("back.dashboard.tenant",['jobsState_count'=>$jobsState_count, 'jobs_count' => $jobs_count,'countApplcatnt'=>$countApplcatnt, 'job_depertments'=>$job_depertments,'jobApplicant'=>$jobApplicant ,'categoryCount'=>$categoryCount,'countApplcatntCount'=>$countApplcatntCount]); 
    }
}
