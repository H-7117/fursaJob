<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\Account\AccountFacade;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJob;
use App\Models\Fursa\jobStage;
use Illuminate\Support\Facades\Auth;

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
        
        $job_counts = [];
        
        foreach ($depertments as $depertment) {
            $job_count = FursaJob::where('depertment_id', $depertment->id)->count();
            $job_counts[$depertment->id] = $job_count;
        }
        
        

        return view("back.dashboard.tenant",['job_counts' => $job_counts]); 
    }
}
