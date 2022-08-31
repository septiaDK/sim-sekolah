<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;
    
    public $table = 'ekstrakurikuler';

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
