<?php

namespace App\Listeners\Account;

use App\Events\Account\UserSignedInEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToUserListener implements ShouldQueue
{
    public function handle(UserSignedInEvent $event)
    {
        // dd($event->user);
        // Logic for sending email to the user
        // Use $event->user to access the user instance

        // Example:
        // Mail::to($event->user->email)
        //     ->send(new WelcomeEmail($event->user));
    }
}