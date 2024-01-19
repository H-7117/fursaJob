<?php

namespace App\Services\Account;

use App\Models\Account\AccountUser;
use App\Models\Account\AccountRole;
use App\Events\Account\UserSignedUp;
use App\Events\Account\UserSignedInEvent;
use App\Models\Account\AccountTenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;

class AccountService
{

    /**
     * Get an instance of the AccountService.
     *
     * @return \App\Services\Account\AccountService
     */
    public static function getInstance(): AccountService
    {
        return app('account');
    }

    /**
     * Check if the authenticated user has the given permission.
     *
     * @param  string  $permission
     * @param  int|null  $tenantId
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        $permissions = $this->userPermissions($user->id);
        foreach ($permissions as $key => $value) {
            if ($permission == $value->name) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if the authenticated user has the given permissions.
     *
     * @param  array  $permissions
     * @param  int|null  $tenantId
     * @return bool
     */
    public function hasPermissions(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if($this->hasPermission($permission)){
                return true;
            }
        }
        return false;
    }

    public function getTenantName(): ?string
    {
        $user = Auth::user();

        if (!$user) {
            return null;
        }
        return $user->tenant->name;
    }

    public function getTenantId(): ?int
    {
        $user = Auth::user();

        if (!$user) {
            return null;
        }
        return $user->tenant->id;
    }

    public function signIn(string $username, string $password) : bool
    {
        $output = false;

        // $tenant = AccountTenant::where('name',$tenant_name)->first();
        // $credentials = array($username, $password);
        $credentials = [
            // 'tenant_id' => $tenant->id,
            'username' => $username,
            'password' => $password
        ];
        $output = Auth::attempt($credentials);
        if($output){
            $id = Auth::user()->id;
            $user = AccountUser::find($id);
            // $user = Auth::user(); //AccountUser::where('username',$username)->first();
            // Trigger the event
            Event::dispatch(new UserSignedInEvent($user));
        }

        return $output;
    }

    public function signUp(string $username, string $email, string $password): AccountUser
    {
        $tenant = AccountTenant::where('name','app')->first();
        $user = AccountUser::create([
            'tenant_id' => $tenant->id,
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        // Trigger the event
        Event::dispatch(new UserSignedUp($user));

        //
        return $user;
    }

    public function signUpAsTenant(string $username, string $email, string $password, string $tenant_name, string $tenant_label): int
    {
        $tenant = AccountTenant::create([
            'name' => $tenant_name,
            'label' => $tenant_label,
        ]);
        $user = AccountUser::create([
            'tenant_id' => $tenant->id,
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
    
        // $user->roles()->sync($userData['roles']);

        // Trigger the event
        Event::dispatch(new UserSignedUp($user));

        //
        return $tenant->id;
    }

    // @TODO
    public function assignUserToRole(AccountUser $user, AccountRole $role) : bool
    {

        return false;
    }

    

    public function paginateRoles($perPage = 10)
    {
        $tenantId = $this->getTenantId();
        // return AccountUser::paginate($perPage);
        return AccountRole::where('tenant_id', $tenantId)
        ->paginate($perPage);
    }

    public function getUserRoles(string $username) : array
    {

        return array();
    }

    public function getPermissions()
    {
        $user = Auth::user();
        if (!$user) {
            return array();
        }
        return $this->userPermissions($user->id);
    }

    public function getUserPermissions(string $username)
    {
        
    }

    public function paginateUsers($perPage = 10)
    {
        $tenantId = $this->getTenantId();
        // return AccountUser::paginate($perPage);
        return AccountUser::where('tenant_id', $tenantId)
        ->paginate($perPage);
    }

    public function getUsername() : ?string
    {
        $user = Auth::user();
        if (!$user) {
            return null;
        }
        return $user->username;
    }

    // ==============================
    private function userPermissions(int $user_id)
    {
        $permissions = array();
        $user = AccountUser::find($user_id);
        $roles = $user->roles;
        foreach ($roles as $key => $_role) {
            $role = AccountRole::find($_role->id);
            $role_permissions = $role->permissions;
            foreach ($role_permissions as $key => $value) {
                $permissions[$key] = $value;
            }
        }
        return $permissions;
    }
}