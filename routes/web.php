<?php

use App\Http\Controllers\FakultasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Cara membuat route, profil berasal dari 
//folder views dengan nama file profile
Route::get('/profil', function () {  
    return view('profil');
});

Route::resource('/fakultas', FakultasController::class);
