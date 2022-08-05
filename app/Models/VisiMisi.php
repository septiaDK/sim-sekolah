<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    public $table = 'visi_misi';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'visi',
        'misi',
        'tujuan',
        'created_at',
        'updated_at'
    ];
}
