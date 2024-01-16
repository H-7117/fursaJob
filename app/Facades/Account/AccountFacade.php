<?php

namespace App\Facades\Account;

use Illuminate\Support\Facades\Facade;

class AccountFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'account';
    }
}