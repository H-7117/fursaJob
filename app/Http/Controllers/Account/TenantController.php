<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account\AccountTenant;
//
use App\Facades\Account\AccountFacade;

class TenantController extends Controller
{
    public function index()
    {
        $hasPermission = AccountFacade::hasPermission('manage_tenants');
        if(!$hasPermission){
            return view('errors.404');
        }
        // Fetch users with pagination, where 10 is the number of users per page
        $tenants = AccountTenant::paginate(1); 
        return view('back.account.tenants.index', compact('tenants'));
    }
}
