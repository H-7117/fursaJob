<?php

namespace Database\Seeders\Files;

use App\Models\File\FileType as FilesFileType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FilesFileType::create([
            "name"=> "png",
            "label"=> "صورة",
            "icon"=> "1",]);
            FilesFileType::create([
                "name"=> "jpeg",
                "label"=> "صورة",
                "icon"=> "1",]);
                FilesFileType::create([
                    "name"=> "jpg",
                    "label"=> "صورة",
                    "icon"=> "1",]);
    }
}
