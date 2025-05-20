<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ekskul;
use App\Models\Kegiatan;
use App\Models\Pembina;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(Request $request)
    {
        // Tangkap query parameter 'generasi' dari URL, bisa null
        $selectedGenerasi = $request->query('generasi');

        // Ambil anggota, filter berdasarkan generasi jika ada
        $anggota = Anggota::with(['ekskul', 'jabatan'])
            ->when($selectedGenerasi, function ($query, $selectedGenerasi) {
                return $query->where('generasi', $selectedGenerasi);
            })
            ->get();

        // Ambil daftar generasi unik dari anggota untuk dropdown filter
        $generasiList = Anggota::select('generasi')
            ->distinct()
            ->orderBy('generasi')
            ->pluck('generasi');

        // Ambil data lain
        $ekskul = Ekskul::all();
        $pembina = Pembina::with('ekskul')->get();
        $kegiatan = Kegiatan::with('ekskul')->get();

        // Kirim semua data ke view, termasuk variabel generasiList dan selectedGenerasi
        return view('frontend.index', compact('anggota', 'ekskul', 'pembina', 'kegiatan', 'generasiList', 'selectedGenerasi'));
    }
}
