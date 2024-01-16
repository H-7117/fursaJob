<?php

namespace Database\Seeders\Account;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account\AccountTenant;
use App\Models\Account\AccountUser;
use App\Models\Account\AccountRole;
use App\Models\Account\AccountPermission;

class TenantRoleLinkWithTenantUsersAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //
        // // Assign permissions to roles
        // $adminPermissions = [
        //     'access-dashboard',
        //     'edit-any-content',
        //     // Add more permissions for the admin role
        // ];

        // $userPermissions = [
        //     // Add permissions for the user role
        // ];

        // // $adminRole = Role::where('name', 'admin')->first();
        // // $adminRole->permissions()->attach($this->getPermissionIds($adminPermissions));
        // // $adminRole->save();

        // // $userRole = Role::where('name', 'user')->first();
        // // $userRole->permissions()->attach($this->getPermissionIds($userPermissions));
        // // $userRole->save();

        $platformTenant = AccountTenant::where('name', 'platform')->first();
        $appTenant      = AccountTenant::where('name', 'app')->first();

        //
        $permissionName = 'become_tenant';
        $permission = AccountPermission::where('name', $permissionName)->first();
        $permission->roles()->attach(AccountRole::where([
            ['name', '=', 'using'],
            ['tenant_id', '=', $appTenant->id],
        ])->first()->id);
        $permission->save();
        //
        //
        $permissionName = 'manage_own_tenant';
        $permission = AccountPermission::where('name', $permissionName)->first();
        $permission->roles()->attach(AccountRole::where([
            ['name', '=', 'administration'],
            ['tenant_id', '=', $appTenant->id],
        ])->first()->id);
        $permission->save();
        //
        $permissionName = 'add_content';
        $permission = AccountPermission::where('name', $permissionName)->first();
        $permission->roles()->attach(AccountRole::where([
            ['name', '=', 'administration'],
            ['tenant_id', '=', $appTenant->id],
        ])->first()->id);
        $permission->save();
        //
        $permissionName = 'manage_any_content';
        $permission = AccountPermission::where('name', $permissionName)->first();
        $permission->roles()->attach(AccountRole::where([
            ['name', '=', 'administration'],
            ['tenant_id', '=', $appTenant->id],
        ])->first()->id);
        $permission->save();
        //
        //
        $permissionName = 'manage_tenants';
        $permission = AccountPermission::where('name', $permissionName)->first();
        $permission->roles()->attach(AccountRole::where([
            ['name', '=', 'administration'],
            ['tenant_id', '=', $platformTenant->id],
        ])->first()->id);
        $permission->save();
        //
        $permissionName = 'add_content';
        $permission = AccountPermission::where('name', $permissionName)->first();
        $permission->roles()->attach(AccountRole::where([
            ['name', '=', 'administration'],
            ['tenant_id', '=', $platformTenant->id],
        ])->first()->id);
        $permission->save();
        //
        $permissionName = 'manage_any_content';
        $permission = AccountPermission::where('name', $permissionName)->first();
        $permission->roles()->attach(AccountRole::where([
            ['name', '=', 'administration'],
            ['tenant_id', '=', $platformTenant->id],
        ])->first()->id);
        $permission->save();
        //
        //RoleWithUser
        //
        $user = AccountUser::where([
            ['username', '=', 'admin'],
            ['tenant_id', '=', $platformTenant->id],
        ])->first();
        $user->roles()->attach(AccountRole::where([
            ['name', '=', 'administration'],
            ['tenant_id', '=', $platformTenant->id],
        ])->first()->id);
        $user->save();
        //
        $user = AccountUser::where([
            ['username', '=', 'user'],
            ['tenant_id', '=', $platformTenant->id],
        ])->first();
        $user->roles()->attach(AccountRole::where([
            ['name', '=', 'using'],
            ['tenant_id', '=', $platformTenant->id],
        ])->first()->id);
        $user->save();
        //
        $user = AccountUser::where([
            ['username', '=', 'admin'],
            ['tenant_id', '=', $appTenant->id],
        ])->first();
        $user->roles()->attach(AccountRole::where([
            ['name', '=', 'administration'],
            ['tenant_id', '=', $appTenant->id],
        ])->first()->id);
        $user->save();
        //
        $user = AccountUser::where([
            ['username', '=', 'user'],
            ['tenant_id', '=', $appTenant->id],
        ])->first();
        $user->roles()->attach(AccountRole::where([
            ['name', '=', 'using'],
            ['tenant_id', '=', $appTenant->id],
        ])->first()->id);
        $user->save();

        
    }

    private function getPermissionIds(array $permissionNames)
    {
        return AccountPermission::whereIn('name', $permissionNames)->pluck('id');
    }
}
