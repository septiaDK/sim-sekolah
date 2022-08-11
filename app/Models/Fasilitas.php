<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    public $table = 'fasilitas';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'judul',
        'deskripsi',
        'cover',
        'created_at',
        'updated_at'
    ];
}
