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
            $table->id(); // auto_increment dan primary key
            $table->string('nisn')->unique(); // jadikan unik, tapi bukan primary key
            $table->string('nama_anggota');
            $table->unsignedBigInteger('id_ekskul');
            $table->unsignedBigInteger('id_jabatan');
            $table->string('generasi');
            $table->string('jurusan');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
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
