<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $fillable = [
        'nisn',
        'nama_anggota',
        'id_ekskul',
        'id_jabatan',
        'generasi',
        'jurusan',
        'status',
        'foto_profil',
    ];

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class, 'id_ekskul');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
