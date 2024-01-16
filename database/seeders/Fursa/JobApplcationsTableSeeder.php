<?php

namespace Database\Seeders\Fursa;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJobApplcation;
use App\Models\Fursa\FursaJob;

class JobApplcationsTableSeeder extends Seeder
{
    public function run()
    {   
        $jobDepertement1 = FursaDepertment::where('name','financial')->first();
        $jobFront = FursaJob::where([
            ['name', '=', 'backend'],
            ['depertment_id', '=', $jobDepertement1->id],
        ])->first();
    
        FursaJobApplcation::create([
            'name'=>0,
            'phone'=>1,
            'personalEmail'=> 0,
            'links'=>1,
            'cv'=>0,
            'job_id'=> $jobFront->id,
        ]);
      

    }
}
