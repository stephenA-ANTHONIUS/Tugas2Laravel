@extends('layout.main')

@section('content')
    <h1>Fakultas</h1>
    @foreach ($fakultas as $item)

        {{ $item->nama }}
        {{ $item->singkatan }}
        {{ $item->dekan }}
        {{ $item->wakil_dekan }}
        <br>

    
    @endforeach
@endsection