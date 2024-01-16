<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account\AccountUser;

class UserController extends Controller
{
    public function index()
    {
        // Fetch users with pagination, where 10 is the number of users per page
        $users = AccountUser::paginate(1); 
        return view('back.account.users.index', compact('users'));
    }
}
