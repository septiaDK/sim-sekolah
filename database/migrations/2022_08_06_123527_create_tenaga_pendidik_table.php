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
        Schema::create('tenaga_pendidik', function (Blueprint $table) {
            $table->id();

            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->longText('photo')->nullable();
            $table->enum('status', ['kepala_sekolah', 'guru', 'staff karyawan'])->nullable();

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
        Schema::dropIfExists('tenaga_pendidik');
    }
};
