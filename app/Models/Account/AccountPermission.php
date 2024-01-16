<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPermission extends Model
{
    use HasFactory;

    protected $table = 'account__permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'label',
    ];

    public function roles()
    {
        return $this->belongsToMany(AccountRole::class, 'account__roles_permissions');
    }
}
