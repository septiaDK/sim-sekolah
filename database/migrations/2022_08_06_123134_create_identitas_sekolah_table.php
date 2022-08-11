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
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->longText('struktur_organisasi')->nullable();

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
