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
        'alamat',
        'phone',
        'email',
        'url_maps',
        'url_website',
        'instagram',
        'facebook',
        'youtube',
        'struktur_organisasi',
        'created_at',
        'updated_at'
    ];
}
