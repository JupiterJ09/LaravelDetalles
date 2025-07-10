<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ContactForm;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', ContactForm::class);

Route::get('/hola', function () {
    return view('hola');
});

Route::get('/hello', function () {
    return view('hello');
});