<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fursa\FursaJob;

class HomeController extends Controller
{
    //
    public function show()
    {
        $locations = FursaJob::distinct()->pluck('location');
        $Category = FursaJob::distinct()->pluck('Category');
        return view("front.home",compact('locations','Category'));
    }

    
}
