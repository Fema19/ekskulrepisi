<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembinaController extends Controller
{
    // Halaman Index
    public function index()
    {
        $pembina = Pembina::with('ekskul')->get(); // Ambil data pembina beserta relasi ekskul
        return view('pembina.index', compact('pembina'));
    }

    // Halaman Create
    public function create()
    {
        $ekskul = Ekskul::all(); // Ambil semua data ekskul yang sudah ada
        return view('pembina.create', compact('ekskul'));
    }

    // Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pembina,nip|max:20',
            'nama_pembina' => 'required|string|max:255',
            'id_ekskul' => 'required|exists:ekskuls,id', // diperbaiki: ekskul -> ekskuls
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string', // Tambahan validasi
        ]);

        $fotoProfilPath = null;
        if ($request->hasFile('foto_profil')) {
            $fotoProfilPath = $request->file('foto_profil')->store('foto_profil', 'public');
        }

        Pembina::create([
            'nip' => $request->nip,
            'nama_pembina' => $request->nama_pembina,
            'id_ekskul' => $request->id_ekskul,
            'foto_profil' => $fotoProfilPath,
            'deskripsi' => $request->deskripsi, // Tambahan field
        ]);

        return redirect()->route('pembina.index')->with('success', 'Data pembina berhasil ditambahkan.');
    }

    // Halaman Edit
    public function edit($nip)
    {
        $pembina = Pembina::findOrFail($nip);
        $ekskul = Ekskul::all(); // Ambil semua data ekskul yang sudah ada
        return view('pembina.edit', compact('pembina', 'ekskul'));
    }

    // Update Data
    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama_pembina' => 'required|string|max:255',
            'id_ekskul' => 'required|exists:ekskuls,id', // diperbaiki: ekskul -> ekskuls
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string', // Tambahan validasi
        ]);

        $pembina = Pembina::findOrFail($nip);

        if ($request->hasFile('foto_profil')) {
            if ($pembina->foto_profil) {
                Storage::disk('public')->delete($pembina->foto_profil);
            }

            $fotoProfilPath = $request->file('foto_profil')->store('foto_profil', 'public');
            $pembina->update(['foto_profil' => $fotoProfilPath]);
        }

        $pembina->update([
            'nama_pembina' => $request->nama_pembina,
            'id_ekskul' => $request->id_ekskul,
            'deskripsi' => $request->deskripsi, // Tambahan update field
        ]);

        return redirect()->route('pembina.index')->with('success', 'Data pembina berhasil diperbarui.');
    }

    // Hapus Data
    public function destroy($nip)
    {
        $pembina = Pembina::findOrFail($nip);

        // Hapus foto profil jika ada
        if ($pembina->foto_profil) {
            Storage::disk('public')->delete($pembina->foto_profil);
        }

        $pembina->delete();

        return redirect()->route('pembina.index')->with('success', 'Data pembina berhasil dihapus.');
    }
}
