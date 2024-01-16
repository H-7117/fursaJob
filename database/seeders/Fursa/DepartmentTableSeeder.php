<?php

namespace Database\Seeders\Fursa;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Fursa\FursaCompany;
use App\Models\Fursa\FursaDepertment;

class DepartmentTableSeeder extends Seeder
{
    public function run()
    {
        
        // $company = FursaCompany::where('name','hail_saeed')->first();
        $company = FursaCompany::where('name','alatas')->first();
        FursaDepertment::create([
            'name' => 'financial',
            'label'=>'الماليه',
            'description'=>'قسم الماليه في هائل سعيد',
            'company_id'=> $company->id,
        ]);

        // FursaDepertment::create([
        //     'name' => 'financial',
        //     'label'=>'الماليه',
        //     'description'=>'قسم الماليه في هائل سعيد',
        //     'company_id'=> $company1->id,
        // ]);

        
    }
}
