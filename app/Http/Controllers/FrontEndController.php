<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Pembina;
use App\Models\Anggota;
use App\Models\Kegiatan;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function showEkskul()
    {
        $ekskul = Ekskul::all();
        return view('frontend.ekskul', compact('ekskul'));
    }

    public function showPembina()
    {
        $pembina = Pembina::with('ekskul')->get();
        return view('frontend.pembina', compact('pembina'));
    }

    public function showAnggota()
    {
        $anggota = Anggota::with(['ekskul', 'jabatan'])->get();
        return view('frontend.anggota', compact('anggota'));
    }

    public function showKegiatan()
    {
        $kegiatan = Kegiatan::with('ekskul')->get();
        return view('frontend.kegiatan', compact('kegiatan'));
    }
}
