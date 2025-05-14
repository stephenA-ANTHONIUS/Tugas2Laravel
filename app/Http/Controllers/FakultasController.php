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
    public function show(Fakultas $fakultas) // menampilkan detail data
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        //
    }
}
