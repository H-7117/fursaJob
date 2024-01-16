<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AccountRolePermission extends Pivot
{
    protected $table = 'account__roles_permissions';

    // Define the relationship with the AccountRole model
    public function role()
    {
        return $this->belongsTo(AccountRole::class, 'role_id');
    }

    // Define the relationship with the AccountUser model
    public function permission()
    {
        return $this->belongsTo(AccountPermission::class, 'permission_id');
    }
}