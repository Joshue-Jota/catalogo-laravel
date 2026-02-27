<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/categoria', function () {
    return view('Categoria.index');
});
Route::get('/categoria/create', [CategoriaController::class, 'create']); //esto nos sirve para entrar a la vista de crear categoria
*/
Route::resource('categoria', CategoriaController::class); //esto nos sirve para entra a todas las vistas de categoria, es decir, index, create, store, show, edit, update y destroy  
Route::resource('producto', ProductoController::class); //esto nos sirve para entra a todas las vistas de producto, es decir, index, create, store, show, edit, update y destroy