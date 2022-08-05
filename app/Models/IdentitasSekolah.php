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
        'npsn',
        'status',
        'bentuk_pendidikan',
        'sk_berdiri',
        'tgl_sk_berdiri',
        'sk_operasional',
        'tgl_sk_operasional',
        'alamat',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'lintang',
        'bujur',
        'sejarah',
        'foto_profil',
        'created_at',
        'updated_at'
    ];
}
