<?php

namespace App\Models\Fursa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;


class FursaJob extends Model
{
    use HasFactory;
    protected $table = 'fursa__jobs';

    protected $fillable = [
        'label',
        'name',
        'job_description',
        'job_tasks',
        'Category',
        'job_type',
        'status',
        'Location',
        'depertment_id'
    ];

    public function departments()
    {
        return $this->belongsTo(FursaDepertment::class,'depertment_id');
    }

    public function stages()
    {
        return $this->hasMany(jobStage::class,'job_id');
    }
    

    // public function vacancy(): HasOne
    // {
    //     return $this->hasOne(vacancy::class);
    // }

    // public function jobSatge()
    // {
        
    //     return $this->hasMany(JobStage::class);
    // }

    public function jobApplcation()
    {
        
        return $this->hasOne(FursaJobApplcation::class,'job_id');
    }
}
