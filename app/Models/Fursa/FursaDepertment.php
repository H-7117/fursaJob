<?php

namespace App\Models\Fursa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fursa\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FursaDepertment extends Model
{
    use HasFactory;
    
    protected $table = 'fursa__depertments';

    protected $fillable = [
        'name',
        'label',
        'description',
        'company_id'
    ];

    public function company()
    {
        
        return $this->belongsTo(FursaCompany::class,'companies_id');
    }
    

    // public function job()
    // {
        
    //     return $this->hasMany(job::class);
    // }
}
