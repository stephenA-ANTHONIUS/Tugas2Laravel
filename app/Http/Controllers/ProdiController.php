<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Panggil model prodi menggunakan eloquent / do Query
        $prodi = Prodi::all(); // sama dengan perintah SQL select * from prodi
        //dd($prodi); // singkatan DD = dump and die
        return view('prodi.index')->with('prodi', $prodi); // selain compact bisa menggunakan with
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $input = $request->validate([
            'nama' => 'required|unique:prodi',
            'singkatan' => 'required|max:2',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id'
        ]);
        // simpan data ke tabel prodi
        Prodi::create($input);
        // redirect ke halaman prodi.index
        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
