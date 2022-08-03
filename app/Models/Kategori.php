<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $table = 'kategori';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'nama',
        'created_at',
        'updated_at'
    ];

}
