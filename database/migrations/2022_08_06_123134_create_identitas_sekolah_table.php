<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas_sekolah', function (Blueprint $table) {
            $table->id();
            
            $table->string('nama_sekolah')->nullable();
            $table->string('sk_berdiri')->nullable();
            $table->date('tgl_sk_berdiri')->nullable();
            $table->longText('sejarah_singkat')->nullable();
            $table->longText('struktur_organisasi')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('url_maps')->nullable();
            $table->string('url_website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identitas_sekolah');
    }
};
