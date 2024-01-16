<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SignoutController extends Controller
{
    //
    public function signOut()
    {
        Auth::logout();
        return redirect()->route('home.front');
    }
}
