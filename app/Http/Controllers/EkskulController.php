<?php

    namespace App\Http\Controllers;

    use App\Models\Ekskul;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage;

    class EkskulController extends Controller
    {
        public function index()
        {
            $ekskul = Ekskul::all();
            return view('ekskul.index', compact('ekskul'));
        }

        public function create()
        {
            return view('ekskul.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'nama_ekskul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'logo' => 'nullable|image|max:2048',
            ]);

            $logo = null;
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo')->store('logos', 'public');
            }

            Ekskul::create([
                'nama_ekskul' => $request->nama_ekskul,
                'deskripsi' => $request->deskripsi,
                'logo' => $logo,
            ]);

            return redirect()->route('ekskul.index')->with('success', 'Ekskul berhasil ditambahkan.');
        }

        public function edit($id)
        {
            $ekskul = Ekskul::findOrFail($id);
            return view('ekskul.edit', compact('ekskul'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'nama_ekskul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'logo' => 'nullable|image|max:2048',
            ]);

            $ekskul = Ekskul::findOrFail($id);

            $logo = $ekskul->logo;
            if ($request->hasFile('logo')) {
                if ($logo) Storage::disk('public')->delete($logo);
                $logo = $request->file('logo')->store('logos', 'public');
            }

            $ekskul->update([
                'nama_ekskul' => $request->nama_ekskul,
                'deskripsi' => $request->deskripsi,
                'logo' => $logo,
            ]);

            return redirect()->route('ekskul.index')->with('success', 'Ekskul berhasil diperbarui.');
        }

        public function destroy($id)
        {
            $ekskul = Ekskul::findOrFail($id);
            if ($ekskul->logo) Storage::disk('public')->delete($ekskul->logo);
            $ekskul->delete();
            return redirect()->route('ekskul.index')->with('success', 'Ekskul berhasil dihapus.');
        }

        public function cekEkskul()
        {
            $jumlah = DB::table('ekskuls')->where('id', 1)->count();

            if ($jumlah > 0) {
                return "Data ekskul dengan ID 1 ditemukan.";
            } else {
                return "Data ekskul dengan ID 1 tidak ditemukan.";
            }
        }
    }
