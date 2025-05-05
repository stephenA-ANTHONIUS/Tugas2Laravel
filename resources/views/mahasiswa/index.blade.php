@extends('layouts.main')

@section('content')
    <h1>Mahasiswa</h1>
    @foreach ($mahasiswa as $item)

        {{ $item->npm }}
        {{ $item->nama }}
        {{ $item->prodi->nama }}
        {{$item->foto}}
        <br>

    @endforeach
@endsection