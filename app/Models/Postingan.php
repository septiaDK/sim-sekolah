<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    public $table = 'postingan';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'cover',
        'updated_at'
    ];

    public function categories() {
        return $this->belongsToMany('App\Models\Kategori');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
