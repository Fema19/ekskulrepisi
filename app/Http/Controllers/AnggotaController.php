<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ekskul;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    // Tampilkan semua data anggota dengan filter generasi
    public function index(Request $request)
    {
        $selectedGenerasi = $request->get('generasi');

        $anggota = Anggota::with(['ekskul', 'jabatan'])
            ->when($selectedGenerasi, function ($query, $selectedGenerasi) {
                return $query->where('generasi', $selectedGenerasi);
            })
            ->get();

        $generasiList = Anggota::select('generasi')->distinct()->orderBy('generasi')->pluck('generasi');

        return view('anggota.index', compact('anggota', 'generasiList', 'selectedGenerasi'));
    }

    // Method lainnya tetap sama seperti semula...
    public function create()
    {
        $ekskul = Ekskul::all();
        $jabatan = Jabatan::all();
        return view('anggota.create', compact('ekskul', 'jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:anggota,nisn|max:20',
            'nama_anggota' => 'required|string|max:255',
            'id_ekskul' => 'required|exists:ekskuls,id',
            'id_jabatan' => 'required|exists:jabatan,id',
            'generasi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:100000',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_profil')) {
            $fotoPath = $request->file('foto_profil')->store('foto_profil', 'public');
        }

        Anggota::create([
            'nisn' => $request->nisn,
            'nama_anggota' => $request->nama_anggota,
            'id_ekskul' => $request->id_ekskul,
            'id_jabatan' => $request->id_jabatan,
            'generasi' => $request->generasi,
            'jurusan' => $request->jurusan,
            'status' => $request->status,
            'foto_profil' => $fotoPath,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $ekskul = Ekskul::all();
        $jabatan = Jabatan::all();
        return view('anggota.edit', compact('anggota', 'ekskul', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'id_ekskul' => 'required|exists:ekskuls,id',
            'id_jabatan' => 'required|exists:jabatan,id',
            'generasi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:100000',
        ]);

        $anggota = Anggota::findOrFail($id);

        if ($request->hasFile('foto_profil')) {
            if ($anggota->foto_profil && Storage::disk('public')->exists($anggota->foto_profil)) {
                Storage::disk('public')->delete($anggota->foto_profil);
            }
            $anggota->foto_profil = $request->file('foto_profil')->store('foto_profil', 'public');
        }

        $anggota->update([
            'nama_anggota' => $request->nama_anggota,
            'id_ekskul' => $request->id_ekskul,
            'id_jabatan' => $request->id_jabatan,
            'generasi' => $request->generasi,
            'jurusan' => $request->jurusan,
            'status' => $request->status,
            'foto_profil' => $anggota->foto_profil,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);

        if ($anggota->foto_profil && Storage::disk('public')->exists($anggota->foto_profil)) {
            Storage::disk('public')->delete($anggota->foto_profil);
        }

        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}
