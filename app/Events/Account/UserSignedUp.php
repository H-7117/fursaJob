<?php

namespace App\Events\Account;

use App\Models\Account\AccountUser;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserSignedUp
{
    use Dispatchable, SerializesModels;

    public $user;

    public function __construct(AccountUser $user)
    {
        $this->user = $user;
    }
}