<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    public $table = 'jurusan';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'nama',
        'keterangan',
        'cover',
        'created_at',
        'updated_at'
    ];
}
