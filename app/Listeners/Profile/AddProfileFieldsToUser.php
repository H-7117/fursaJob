<?php

namespace App\Listeners\Profile;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Http\Events\RequestHandled;

class AddProfileFieldsToUser // implements ShouldQueue
{
    public function handle(RequestHandled $event)
    {
        // Create the object you want to add to the response
        $profile = [
            'name' => 'عبدالله سويلم',
            'job' => 'مطور مواقع',
        ];

        // Retrieve the response 
        $response = $event->response;

        // Add the object to the response data
        // $response-> = "Sowailem";// $profile;

        // Set the modified response content
        $response->setContent($profile);
    }
}

