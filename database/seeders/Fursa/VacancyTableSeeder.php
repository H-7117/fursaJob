<?php

namespace Database\Seeders\Fursa;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Fursa\Fursavacancy;
use App\Models\Fursa\FursaJob;


class VacancyTableSeeder extends Seeder
{
    public function run()
    {   
        // $job = FursaJob::where('name', 'frontend')->first();

        // if ($job) {
        //     $departmentId = $job->department_id;
        //     // Use the departmentId as needed
        // } else {
        //     // Handle the case where no job with the name "frontend" is found
        // }

        $job = FursaJob::where('name','backend')->first();
        $jobFront = FursaJob::where([
            ['name', '=', 'backend'],
            ['depertment_id', '=', $job->id],
        ])->first();
        Fursavacancy::create([
            'job_id' => $jobFront->id,
            'number_of_applicants'=>5,
            'jobState'=>0
        ]);

      
    }
}
