<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\Account\AccountFacade;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
        // $hasPermission = AccountFacade::hasPermission('become_tenant');
        return view("back.dashboard.user"); //,compact('hasPermission'));
    }
}
