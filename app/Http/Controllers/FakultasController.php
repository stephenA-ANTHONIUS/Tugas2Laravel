<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // untuk menampilkan list data
    {
        // panggil model fakultas menggunakan eloquent / do Query
        $fakultas = Fakultas::all(); // sama dengan perintah SQL select * from fakultas
        //dd($fakultas); // singkatan DD = dump and die
        return view('fakultas.index', compact('fakultas')); // selain compact bisa menggunakan width
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // untuk menampilkan tambah data
    {
        return view ('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // penyimpanan data
    {
        // validasi inout
        $input = $request->validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required'
        ]);

        // simpan data ke tabel fakultas
        Fakultas::create($input);

        // redirect ke halaman fakultas.index
        return redirect()->route('fakultas.index')->with('success', 'Data fakultas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($fakultas) // menampilkan detail data
    {
        //dd($fakultas);
        $fakultas=Fakultas::findOrFail($fakultas); // buat ngambil data fakultas berdasarkan id
        return view('fakultas.show', compact('fakultas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fakultas)
    {
        //dd($fakultas); // menampilkan form edit data
        $fakultas = Fakultas::findOrFail($fakultas); // buat ngambil data fakultas berdasarkan id
        return view('fakultas.edit', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $fakultas)
    {
        //dd($fakultas);
        $fakultas = Fakultas::findOrFail($fakultas);
        //validasi input
        $input = $request->validate([
            'nama' => 'required',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required'
        ]);
        //update data ke tabel fakultas
        $fakultas->update($input);
        // redirect ke halaman fakultas.index
        return redirect()->route('fakultas.index')->with('success', 'Fakultas Berhasil Diupdate!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fakultas)
    {
        //dd($fakultas); misal katek atribute pake yg bawah
        $fakultas = Fakultas::findOrFail($fakultas);

        // hapus data fakultas
        $fakultas->delete();

        // redirect ke halaman fakultas.index
        return redirect()->route('fakultas.index')->with('success', 'Data fakultas berhasil dihapus!');
    }
}
