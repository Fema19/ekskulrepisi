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
        Schema::create('anggota', function (Blueprint $table) {
    $table->id();
    $table->string('nisn')->unique();
    $table->string('nama_anggota');
    $table->unsignedBigInteger('id_ekskul');
    $table->unsignedBigInteger('id_jabatan');
    $table->string('generasi');
    $table->string('jurusan');
    $table->enum('status', ['aktif', 'nonaktif']);
    $table->string('foto_profil')->nullable();
    $table->timestamps();

    $table->foreign('id_ekskul')->references('id')->on('ekskuls')->onDelete('cascade');
    $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
