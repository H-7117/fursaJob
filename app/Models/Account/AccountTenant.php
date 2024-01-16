<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTenant extends Model
{
    use HasFactory;

    protected $table = 'account__tenants';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'label',
    ];

    public function users()
    {
        return $this->hasMany(AccountUser::class);
    }
}
