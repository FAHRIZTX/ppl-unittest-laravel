<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->unsignedBigInteger('fakultas_id');
            $table->unsignedBigInteger('program_studi_id');
            $table->timestamps();

            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('program_studi_id')->references('id')->on('program_studi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
