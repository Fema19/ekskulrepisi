<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ekskul;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        // Memuat relasi ekskul dan jabatan agar bisa diakses di Blade
        $anggota = Anggota::with(['ekskul', 'jabatan'])->get();

        // Ambil semua ekskul
        $ekskul = Ekskul::all();

        $kegiatan = Kegiatan::with('ekskul')->get();

        // Mengirim data ke view frontend.index
        return view('frontend.index', compact('anggota', 'ekskul', 'kegiatan'));
    }
}
