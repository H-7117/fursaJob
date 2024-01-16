<?php

namespace App\Models\Account;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AccountUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'account__users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tenant_id',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function tenant()
    {
        return $this->belongsTo(AccountTenant::class);
    }
    
    public function roles()
    {
        return $this->belongsToMany(AccountRole::class, 'account__roles_users');
    }

    // public function assignRole($role)
    // {
    //     if (is_string($role)) {
    //         $role = AccountRole::where('name', $role)->firstOrFail();
    //     }
    //     $this->roles()->syncWithoutDetaching($role);
    // }

    // public function revokeRole($role)
    // {
    //     if (is_string($role)) {
    //         $role = AccountRole::where('name', $role)->firstOrFail();
    //     }
    //     $this->roles()->detach($role);
    // }
}
