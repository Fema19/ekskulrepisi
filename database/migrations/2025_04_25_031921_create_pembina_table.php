<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembina', function (Blueprint $table) {
            $table->string('nip')->primary(); // NIP sebagai primary key
            $table->string('nama_pembina'); // Nama pembina
            $table->unsignedBigInteger('id_ekskul'); // Foreign key ke tabel ekskuls
            $table->foreign('id_ekskul')->references('id')->on('ekskuls')->onDelete('cascade'); // Merujuk ke tabel ekskuls
            $table->string('foto_profil')->nullable(); // Foto profil, nullable agar opsional
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembina');
    }
};
