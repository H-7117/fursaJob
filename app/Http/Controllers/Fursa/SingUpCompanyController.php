<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use App\Models\Fursa\FursaCompany;
use Illuminate\Http\Request;

class SingUpCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function view(){
        return view('front.account.signupCompany');
    }
    public function store(Request $request)
    {
        $username =  $request->input('name');
        $email = $request->input('email_address');
        $password = $request->input('password'); 
        $tenant_name =  $username;
        $tenant_label = $request->input('label');
        $tenant = AccountFacade::signUpAsTenant($username, $email, $password, $tenant_name, $tenant_label);
        // dd($tenant);
        //
        $company = new FursaCompany();
        $company->id = $tenant;
        $company->name = $request->input('name');
        $company->label =$request->input('label');
        $company->email_address = $request->input('email_address');
        $company->country = $request->input('country');
        $company->city = $request->input('city');
        $company->about_company = $request->input('about_company');
        
        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/companies/',$fileName);
            $company->logo = $fileName;
        }
        
    $company->save();   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
