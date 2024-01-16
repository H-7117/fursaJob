<?php

namespace Database\Seeders\Fursa;

use App\Models\Fursa\FursaCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Fursa\FurseSeekers;


class SeekerTableSeeder extends Seeder
{
    public function run()
    {   
        FurseSeekers::create([
            'user_id' => 1,
            'userName'=>'h-7117',
            'Specialization'=>'برمجة وتطوير المواقع والتطبيقات',
            'PositionTitle'=>'مطور كامل',
        ]);

        
    }
}
