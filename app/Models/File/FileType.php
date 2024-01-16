<?php

namespace App\Models\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    use HasFactory;
    protected $table = 'file__file_types';
    protected $fillable = [
        'name',
        'label',
        'icon',
    ];
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
