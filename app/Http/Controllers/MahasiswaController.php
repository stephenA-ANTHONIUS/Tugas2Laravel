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
        // Panggil model mahasiswa menggunakan eloquent / do Query
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
        Prodi::create($input);
        // redirect ke halaman prodi.index
        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
