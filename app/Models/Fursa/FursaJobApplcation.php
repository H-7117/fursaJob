<?php

namespace App\Models\Fursa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FursaJobApplcation extends Model
{
    use HasFactory;
    protected $table = 'fursa__job_applcations';

    protected $fillable = [
        'job_id',
        'name',
        'phone',
        'personalEmail',
        'links',
        'cv'
    ];

    public function job()
    {
        return $this->belongsTo(FursaJob::class,'job_id');
    }
        
}
