<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;
    protected $table = 'ekskuls'; // Nama tabel
    protected $fillable = ['nama_ekskul', 'deskripsi', 'logo'];

       // Relasi ke tabel pembina
    public function pembina()
    {
        return $this->hasMany(Pembina::class, 'id_ekskul');
    }

}
