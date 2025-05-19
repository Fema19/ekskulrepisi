<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ekskul;
use App\Models\Kegiatan;
use App\Models\Pembina;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        // Ambil semua data dengan relasinya
        $anggota = Anggota::with(['ekskul', 'jabatan'])->get();
        $ekskul = Ekskul::all();
        $pembina = Pembina::with('ekskul')->get();
        $kegiatan = Kegiatan::with('ekskul')->get();

        // Kirim SEMUA data ke view
        return view('frontend.index', compact('anggota', 'ekskul', 'pembina', 'kegiatan'));
    }
}
