<?php

namespace App\Http\Controllers\Account;

use App\Facades\Account\AccountFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;
use App\Models\Account\AccountUser;
use App\Models\Fursa\FursaCompany;
use App\Services\Account\AccountService;

class SigninController extends Controller
{

    public function __construct(private AccountService $service){}

    public function view(Request $request)
    {   
        if (Auth::check()) {
            // User is already signed in, redirect to a different page

            return redirect()->route('dashboard.user');
        }
        return view('front.account.signin');
    }

    public function authenticate(Request $request)
    {
        $tenant = "app";
        if($request->filled('tenant'))
        {
            $tenant = $request->tenant;
        }
        if($this->service->signIn($request->username, $request->password, $tenant)){
            $request->session()->regenerate();
            //
            
            // $tenant_id = AccountFacade::getTenantId();
            $tenantName = AccountFacade::getTenantName();

            // $user_id = Auth::id();
            // $company = FursaCompany::find($tenant_id);
            // $user = AccountUser::find($user_id);

            if ($tenantName === 'platform') {
                return redirect()->route('dashboard.platform')->withSuccess('تم تسجيل الدخول بنجاح');
            }elseif ($tenantName === 'app') {
                return redirect()->route('user.jobApplied')->withSuccess('تم تسجيل الدخول بنجاح');
            }else{
            return redirect()->route('dashboard.tenant')
                ->withSuccess('تم تسجيل الدخول بنجاح');
            }
        }
        

        
    }
}
