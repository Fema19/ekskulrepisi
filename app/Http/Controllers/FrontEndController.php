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
        try {
            // Tangkap query parameter 'generasi' dari URL, bisa null
            $selectedGenerasi = $request->query('generasi');

            // Ambil anggota, filter berdasarkan generasi jika ada
            $anggota = Anggota::with(['ekskul', 'jabatan'])
                ->when($selectedGenerasi, function ($query, $selectedGenerasi) {
                    return $query->where('generasi', $selectedGenerasi);
                })
                ->orderBy('generasi')
                ->get();

            // Group anggota by generasi
            $groupedAnggota = $anggota->groupBy('generasi');

            // Ambil daftar generasi unik dari anggota untuk dropdown filter
            $generasiList = $anggota->pluck('generasi')->unique()->sort()->values();

            // Ambil data lain
            $ekskul = Ekskul::all();
            $pembina = Pembina::with('ekskul')->get();
            $kegiatan = Kegiatan::all();

            // Kirim semua data ke view, termasuk groupedAnggota dan anggota
            return view('frontend.index', compact('anggota', 'groupedAnggota', 'ekskul', 'pembina', 'kegiatan', 'generasiList', 'selectedGenerasi'));

        } catch (\Exception $e) {
            // Log error jika diperlukan
            \Log::error('Error in FrontEndController@index: ' . $e->getMessage());

            // Return view dengan data kosong jika terjadi error
            return view('frontend.index', [
                'anggota' => collect([]),
                'groupedAnggota' => collect([]),
                'ekskul' => collect([]),
                'pembina' => collect([]),
                'kegiatan' => collect([]),
                'generasiList' => collect([]),
                'selectedGenerasi' => null
            ]);
        }
    }
}
