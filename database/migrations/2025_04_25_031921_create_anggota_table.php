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
            $table->id(); // auto_increment + primary key
            $table->string('nisn')->unique(); // NISN unik
            $table->string('nama_anggota');
            $table->unsignedBigInteger('id_ekskul'); // Foreign key ke tabel ekskul
            $table->unsignedBigInteger('id_jabatan'); // Foreign key ke tabel jabatan
            $table->string('generasi');
            $table->string('jurusan');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();

            // Foreign key constraints
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
