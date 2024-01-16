<?php

namespace App\Http\Controllers\Fursa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Fursa\FursaCompany;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = FursaCompany::all();
        return view('back.Fursa.tenant.index',compact('companies'));

    }

    public function accepted(){
        $companies = FursaCompany::all();
        return view('tenant.acepted',compact('companies'));
    }
    
    public function reject(){
        $companies = FursaCompany::all();
        return view('tenant.reject',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('back.Fursa.tenant.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $company = new FursaCompany;
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

    return redirect()->route('tenant.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $company = FursaCompany::findOrFail($id);
        return view('back.Fursa.tenant.view',compact('company'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $company = FursaCompany::findOrFail($id);
        return view('back.Fursa.tenant.edit',compact('company'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        //
        $company = FursaCompany::findOrFail($id);
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

    return redirect()->route('tenant.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function delete(string $id){
        $company = FursaCompany::find($id);
        return view('tenant.delete', compact('company'));

     }
    public function destroy(string $id)
    {
        //
        $company = FursaCompany::findOrFail($id);
        $company->delete();
        return redirect()->route('tenant.index');
    }
}
