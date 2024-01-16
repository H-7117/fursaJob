<?php

namespace Database\Seeders\Files;

use App\Models\File\File as FilesFile;
use App\Models\File\FileType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class File extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filetype = FileType::where("name", "png")->first()->id;
        FilesFile::create([
            "path"=>"any",
           "file_type_id"=>$filetype,
           "user_id"=> 2,
           "size"=> 52,
        ]);
    }
}
