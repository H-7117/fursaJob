<?php

namespace Database\Seeders\Fursa;

use App\Models\Fursa\FursaCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Fursa\FursaDepertment;
use App\Models\Fursa\FursaJob;


class JobTableSeeder extends Seeder
{
    public function run()
    {   
        // $hail = FursaCompany::where('name','hail_saeed')->first();
        $alatas = FursaCompany::where('name','alatas')->first();
        //
        // $depertmentHail = FursaDepertment::where([
        //     ['name', '=', 'financial'],
        //     ['company_id', '=', $hail->id],
        // ])->first();
        // 
        $depertmentAlatas = FursaDepertment::where([
            ['name', '=', 'financial'],
            ['company_id', '=', $alatas->id],
        ])->first();
        // 
        // FursaJob::create([
        //     'name' => 'frontend',
        //     'label'=>'مصمم واجهات',
        //     'job_description'=>'قسم الماليه في هائل سعيد',
        //     'job_tasks'=>'<li>12121</li>',
        //     'job_type'=>'دوام كامل',
        //     'Category'=>'دعم فني',
        //     'status'=>0,
        //     'Location'=> "المكلا",
        //     'depertment_id'=> $depertmentHail->id,
        // ]);

        FursaJob::create([
            'name' => 'backend',
            'label'=>'مبرمج',
            'job_description'=>'قسم الماليه في هائل سعيد',
            'job_tasks'=>'<li>12121</li>',
            'job_type'=>'دوام كامل',
            'Category'=>'إدارة وأعمال',
            'status'=>1,
            'Location'=> "المكلا",
            'depertment_id'=> $depertmentAlatas->id,
        ]);
    }
}
