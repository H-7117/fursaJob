<?php

namespace App\Http\Controllers\Fursa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fursa\seeker;

class SeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seeker = seeker::all();
        return view('platform.seeker.index',compact('seeker'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('platform.seeker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        seeker::create(
            [
                'user_id' => $request->user_id,
                'userName' => $request->userName,
                'Specialization'=> $request->Specialization,
                'PositionTitle'=> $request->PositionTitle
            ]
            
        );
 
        return redirect()->route('platform.seeker.index');
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
        $seeker = seeker::findOrFail($id);
        return view('platform.seeker.view',compact('seeker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $seeker = seeker::findOrFail($id);
        $seeker->update(
            [
                'user_id' => $request->user_id,
                'userName' => $request->userName,
                'Specialization'=> $request->Specialization,
                'PositionTitle'=> $request->PositionTitle
            ]
        );
        return redirect()->route('platform.seeker.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
