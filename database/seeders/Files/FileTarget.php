<?php

namespace Database\Seeders\Files;

use App\Models\Fursa\FursaJob;

use App\Models\File\FileTarget as file;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileTarget extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        file::create([
            "target_name"=> FursaJob::class,
            "target_name_id"=>5,
            "file_id"=> 1,
        ]
        );
    }
}
