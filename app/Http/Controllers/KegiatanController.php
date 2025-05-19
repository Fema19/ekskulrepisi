<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Menampilkan semua kegiatan.
     */
    public function index()
    {
        $kegiatan = Kegiatan::latest()->get();
        return view('kegiatan.index', compact('kegiatan'));
    }

    /**
     * Menampilkan formulir untuk menambah kegiatan.
     */
    public function create()
    {
        return view('kegiatan.create');
    }

    /**
     * Menyimpan kegiatan baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi foto
        ]);

        $kegiatan = new Kegiatan();
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->deskripsi = $request->deskripsi;

        // Menangani upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kegiatan', 'public');
            $kegiatan->foto = $fotoPath;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    /**
     * Menampilkan formulir untuk mengedit kegiatan yang ada.
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Memperbarui kegiatan yang ada.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi foto
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->deskripsi = $request->deskripsi;

        // Menangani upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($kegiatan->foto) {
                Storage::delete('public/' . $kegiatan->foto);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('kegiatan', 'public');
            $kegiatan->foto = $fotoPath;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    }

    /**
     * Menghapus kegiatan beserta foto yang terkait.
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        // Menghapus foto jika ada
        if ($kegiatan->foto) {
            Storage::disk('public')->delete($kegiatan->foto);
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
