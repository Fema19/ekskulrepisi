<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan'; // Nama tabel
    protected $fillable = ['nama_jabatan']; // Kolom yang dapat diisi

    // Relasi ke tabel anggota
    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'id_jabatan'); // Anggota memiliki foreign key id_jabatan
    }
}
