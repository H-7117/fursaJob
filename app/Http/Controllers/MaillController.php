<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\Hellail;
use App\Models\Fursa\FursaApplicant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MaillController extends Controller
{
    //
    public function index()
    {
        $applicants = session('applicants');
        $applicantsId= FursaApplicant::find($applicants);
        $presonalEmail =  $applicantsId->personalEmail;

        $cotaint = [
            'title' => 'Mail form from hamood',
            'body' => 'check your email'
        ];
        Mail::to($presonalEmail)->send(new Hellail($cotaint));

        return redirect()->back()->withSuccess('تم ارسال الايميل بنجاح');
    }
}
