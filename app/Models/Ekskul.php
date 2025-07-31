<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;
    protected $table = 'ekskuls';

    protected $fillable = [
        'nama_ekskul',
        'deskripsi',
        'logo',
        'tahun_dibentuk',
        'visi',
        'misi',
    ];

    public function pembina()
    {
        return $this->hasMany(Pembina::class, 'id_ekskul');
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'id_ekskul');
    }
}
