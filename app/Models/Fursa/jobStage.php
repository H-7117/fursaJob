<?php

namespace App\Models\Fursa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobStage extends Model
{
    use HasFactory;
    protected $fillable = ['job_id','name','round','fursa__applicant_id'];

    public function job()
    {
        return $this->belongsTo(FursaJob::class);
    }

    public function applicants(){
        return  $this->belongsTo(FursaApplicant::class,'fursa__applicant_id ');
       }
}
