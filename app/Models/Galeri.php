<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    public $table = 'galeri';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'jenis',
        'judul',
        'keterangan',
        'path_link',
        'cover',
        'created_at',
        'updated_at'
    ];
}
