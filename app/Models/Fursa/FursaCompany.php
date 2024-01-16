<?php

namespace App\Models\Fursa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Fursa\Depertment;
class FursaCompany extends Model
{
    use HasFactory;

    protected $table = 'fursa__companies';

    protected $fillable = [
        'name',
        'label',
        'email_address',
        'country',
        'city',
        'about_company',
        'logo'
    ];

        
}
