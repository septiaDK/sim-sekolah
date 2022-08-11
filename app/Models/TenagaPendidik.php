<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPendidik extends Model
{
    use HasFactory;

    public $table = 'tenaga_pendidik';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'nama',
        'nip',
        'photo',
        'status',
        'created_at',
        'updated_at'
    ];
}
