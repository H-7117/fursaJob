<?php

namespace App\Http\Controllers\Fursa;

use App\Facades\Account\AccountFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaCompany;


class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $company = AccountFacade::getTenantId();
        $depertments = FursaDepertment::where('company_id',$company)->get();
        

        // $depertments = FursaDepertment::paginate(1); 
        return view('back.Fursa.depertment.index',compact('depertments'));
    }
    // <h1>{{ $company->name }}</h1>

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $Company = FursaCompany::all();
        return view('back.Fursa.depertment.create',compact('Company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        FursaDepertment::create(
            [
                'name' => $request->name,
                'label' => $request->label,
                'description' => $request->description,
                'company_id'=> AccountFacade::getTenantId()
                 //$request->companies_id
            ]
        );
 
    return redirect()->route('depertment.index')->withSuccess('تم انشاء قطاع جديد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $depertment = FursaDepertment::findOrFail($id);
        return view('back.Fursa.depertment.view',compact('depertment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $depertment = FursaDepertment::findOrFail($id);
        return view('back.Fursa.depertment.edit',compact('depertment'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $depertment = FursaDepertment::findOrFail($id);
        $depertment->update(
            [
                'name' => $request->name,
                'description' => $request->description
            ]
        );
        return redirect()->route('depertment.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function delete(string $id){
        $depertment = FursaDepertment::find($id);
        return view('back.Fursa.depertment.delete', compact('depertment'));

     }
    public function destroy(string $id)
    {
        //
        $depertment = FursaDepertment::findOrFail($id);
        $depertment->delete();
        return redirect()->route('depertment.index');
    }
}
