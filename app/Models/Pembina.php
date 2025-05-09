<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    use HasFactory;

    protected $table = 'pembina'; // Nama tabel
    protected $primaryKey = 'nip'; // Primary key
    public $incrementing = false; // Karena NIP bukan auto-increment
    protected $keyType = 'string'; // Tipe NIP adalah string

    protected $fillable = [
        'nip',
        'nama_pembina',
        'id_ekskul',
        'foto_profil',
    ];

    // Relasi ke tabel ekskul
    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class, 'id_ekskul');
    }
}
