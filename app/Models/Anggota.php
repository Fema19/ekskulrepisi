<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota'; // Nama tabel
    protected $fillable = [
        'nisn',
        'nama_anggota',
        'id_ekskul',
        'id_jabatan',
        'generasi',
        'jurusan',
        'status',
    ];

    // Relasi ke tabel ekskul
    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class, 'id_ekskul');
    }

    // Relasi ke tabel jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
