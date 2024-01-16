<?php

namespace App\Services\File;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

use App\Models\File\File;
use App\Models\File\FileTarget;
use App\Models\File\FileType;

class FileService
{
    public function upload(UploadedFile $uploadedFile, $user_id): int
    {
        $fileSize = $uploadedFile->getSize();
        $fileExtension = $uploadedFile->getClientOriginalExtension();
        $fileName = time().'.'.$fileExtension;// . '_' . $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->storeAs('uploads', $fileName);
        $fileType = FileType::where('name', $fileExtension)->first();
        $file = File::create([
            'path' => 'storage/'.$path,
            'file_type_id' => $fileType->id,
            'user_id' => $user_id,
            'size' => $fileSize,
        ]);
        return $file->id;
    }
    public function link(int $file_id, string $target_type, int $target_type_id)
    {
        $fileTarget = FileTarget::create([
            'target_name' => $target_type,
            'target_name_id' => $target_type_id,
            'file_id' => $file_id
        ]);
    }
    public function download(int $file_id)
    {
        $file = File::where('id', $file_id)->first();
        $filePath =$file->path;
        $filePath = str_replace('storage/', '', $filePath);
        if (Storage::exists($filePath)) {
            $originalName = pathinfo($filePath, PATHINFO_BASENAME);
            // return Storage::download($filePath, $originalName);
            return Storage::download($filePath);
        }

        return response()->json(['error' => 'File not found.'], 404);
    }

    public function url(int $file_id){
        
        $file = File::where('id', $file_id)->first();
        $filePath =$file->path;
        if (Storage::exists(str_replace('storage/', '', $filePath))) {
            return $filePath;
        }
        return response()->json(['error'=> 'file not found'],404);
    }

    public function getFiles(int $user_id, string $target_name, int $target_name_id) : array
    {
        $ids = array();
        $files = File::where('user_id', $user_id)->all();
        foreach ($files as $file) {
            $target = FileTarget::where('file_id', $file->id)
                ->where('target_name', $target_name)
                ->where('targ_name_id', $target_name_id)
                ->first();
            $ids[] = $target->id;
        }
        return $ids;
    }
}
