<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\AccountPermission;
use App\Models\Account\AccountRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch users with pagination, where 10 is the number of users per page
        $roles = AccountRole::paginate(1); 
        return view('back.account.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Get tenant permissions only.
        $permissions = AccountPermission::all();
        return view('back.account.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'label' => 'required',
            // 'description' => 'required',
        ]);

        $role = AccountRole::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('account.back.roles.index')
            ->with('success', 'تم إنشاء الدور بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(AccountRole  $role) // show(int $id)
    {
        // $role = Role::find($id)->first();
        // dd($role);
        return view('back.account.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $role = AccountRole::find($id)->first();
        // Get tenant permissions only.
        $permissions = AccountPermission::all(); 
        return view('back.account.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $id,
            'label' => 'required',
            // 'description' => 'required',
        ]);

        $role = AccountRole::find($id)->first();
        // $role->update($request->all());
        $role->update([
            'name' => $request->input('name'),
            'label' => $request->input('label')
        ]);
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('account.back.roles.index')
            ->with('success', 'تم تعديل الدور بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $role = AccountRole::find($id)->first();
        // dd($role);
        return view('back.account.roles.delete', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $role = AccountRole::find($id)->first();
        
        $role->delete();

        return redirect()->route('account.back.roles.index')
            ->with('success', 'تم حذف الدور بنجاح');
    }
}