<?php

namespace App\Models\Fursa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Fursa\Depertment;
class FursaApplicant extends Model
{
    use HasFactory;


    protected $table = 'fursa__applicants';

    protected $fillable = [
        'user_id',
        'job_application_id',
        'name',
        'phone',
        'personalEmail',
        'links',
        'cv'
    ];

       public function stages(){
        return  $this->hasMany(jobStage::class);
       }
}
