<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // sama dengan perintah SQL select * from mahasiswa
        //dd($mahasiswa); // singkatan DD =
        return view('mahasiswa.index')->with('mahasiswa', $mahasiswa); // selain compact bisa menggunakan with
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswa',
            'nama' => 'required|max:10',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'asal_sma' => 'required',
            'prodi_id' => 'required|exists:prodi,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto'); // ambil file foto
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('images'), $filename); // simpan foto ke folder public/images
            $input['foto'] = $filename; // simpan nama file baru ke input
        }

        
        // simpan data ke tabel prodi
        Mahasiswa::create($input);
        // redirect ke halaman prodi.index
        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        //dd($mahasiswa);
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        // validasi input
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswa',
            'nama' => 'required|max:10',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'asal_sma' => 'required',
            'prodi_id' => 'required|exists:prodi,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto'); // ambil file foto
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $file->move(public_path('images'), $filename); // simpan foto ke folder public/images
            $input['foto'] = $filename; // simpan nama file baru ke input
        }
        $mahasiswa->update($input);
        // redirect ke halaman mahasiswa.index
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);

        // hapus foto jika ada
        if ($mahasiswa->foto) {
            $fotoPath = public_path('images/'. $mahasiswa->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath); // hapusfile foto
            }
        }

        $mahasiswa->delete(); // hapus data mahasiswa
        // redirect ke halaman mahasiswa.index
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
