<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDownload extends Model
{
    use HasFactory;

    public $table = 'file_download';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'judul',
        'path_link',
        'created_at',
        'updated_at'
    ];
}
