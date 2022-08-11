<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasSekolah extends Model
{
    use HasFactory;

    public $table = 'identitas_sekolah';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'nama_sekolah',
        'sk_berdiri',
        'tgl_sk_berdiri',
        'sejarah_singkat',
        'latitude',
        'longitude',
        'struktur_organisasi',
        'created_at',
        'updated_at'
    ];
}
