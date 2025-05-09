<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ekskul;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    // Halaman Index
    public function index()
    {
        $anggota = Anggota::with(['ekskul', 'jabatan'])->get(); // Ambil data anggota beserta relasi
        return view('anggota.index', compact('anggota'));
    }

    // Halaman Create
    public function create()
    {
        $ekskul = Ekskul::all(); // Ambil semua data ekskul
        $jabatan = Jabatan::all(); // Ambil semua data jabatan
        return view('anggota.create', compact('ekskul', 'jabatan'));
    }

    // Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:anggota,nisn|max:20',
            'nama_anggota' => 'required|string|max:255',
            'id_ekskul' => 'required|exists:ekskuls,id',
            'id_jabatan' => 'required|exists:jabatan,id', // Validasi untuk tabel jabatan
            'generasi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Simpan data ke database
        Anggota::create([
            'nisn' => $request->nisn,
            'nama_anggota' => $request->nama_anggota,
            'id_ekskul' => $request->id_ekskul,
            'id_jabatan' => $request->id_jabatan,
            'generasi' => $request->generasi,
            'jurusan' => $request->jurusan,
            'status' => $request->status,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    // Halaman Edit
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $ekskul = Ekskul::all(); // Ambil semua data ekskul
        $jabatan = Jabatan::all(); // Ambil semua data jabatan
        return view('anggota.edit', compact('anggota', 'ekskul', 'jabatan'));
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'id_ekskul' => 'required|exists:ekskuls,id',
            'id_jabatan' => 'required|exists:jabatan,id', // Validasi untuk tabel jabatan
            'generasi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $anggota = Anggota::findOrFail($id);

        // Update data
        $anggota->update([
            'nama_anggota' => $request->nama_anggota,
            'id_ekskul' => $request->id_ekskul,
            'id_jabatan' => $request->id_jabatan,
            'generasi' => $request->generasi,
            'jurusan' => $request->jurusan,
            'status' => $request->status,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    // Hapus Data
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}
