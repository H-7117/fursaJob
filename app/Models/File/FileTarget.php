<?php

namespace App\Models\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileTarget extends Model
{
    use HasFactory;
    protected $table = 'file__file_targets';

    protected $fillable = [
        'target_name',
        'target_name_id',
        'file_id',
    ];
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
