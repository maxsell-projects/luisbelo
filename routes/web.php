<?php

use Illuminate\Support\Facades\Route;
use App\Models\Property;

Route::get('/', function () {
    $properties = Property::latest()->take(3)->get(); 
    return view('home', compact('properties'));
})->name('home');

Route::get('/sobre', function () {
    return view('about');
})->name('about');

Route::get('/portfolio', function () {
    return "Página de Portfólio (Em Breve)";
})->name('portfolio');

Route::get('/blog', function () {
    return view('blog.index');
})->name('blog');

Route::get('/blog/novo-perfil-investidor-luxo', function () {
    return view('blog.show');
})->name('blog.show');

Route::get('/contato', function () {
    return "Página de Contato (Em Breve)";
})->name('contact');

Route::get('/blog/inteligencia-mercado-redefine-investimento', function () {
    return view('blog.show-intelligence');
})->name('blog.show-intelligence');

Route::get('/blog/lisboa-cascais-algarve-eixos-valor', function () {
    return view('blog.show-locations');
})->name('blog.show-locations');