<?php

namespace App\Models\File;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'file__files';
    protected $fillable = [
        'path',
        'file_type_id',
        'user_id',
        'size',
    ] ;
    public function fileType()
    {
        return $this->belongsTo(FileType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
