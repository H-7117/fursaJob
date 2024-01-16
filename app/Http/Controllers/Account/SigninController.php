<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;
use App\Models\Account\AccountUser;
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
            return redirect()->route('dashboard.user')
                ->withSuccess('You have successfully signed in!');
        }
        // $request->validate([
        //     'email' => 'required|email|max:250|unique:users',
        //     'password' => 'required|min:8'
        // ]);

        // $email = $request->email;
        // $password = $request->password;

        

        // // Find the user by email
        // $user = User::where('email', $email)->first();
        // dd($user);exit;

        // // Check the given password against the hashed password
        // if (!Hash::check($password, $user->password)) {
        //     return null;
        // }

        
    }
}
