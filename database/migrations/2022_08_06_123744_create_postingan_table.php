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
        Schema::create('postingan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kategori_id')->nullable()->index('fk_postingan_to_kategori');
            $table->foreignId('user_id')->nullable()->index('fk_postingan_to_user');
            $table->string('judul')->nullable();
            $table->longText('isi')->nullable();
            $table->longText('cover')->nullable();

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
        Schema::dropIfExists('postingan');
    }
};
