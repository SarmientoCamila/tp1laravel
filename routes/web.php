<?php 

use App\Http\Controllers\ControlladorSalones;
use Illuminate\Support\Facades\Route;

// Ruta para la página de inicio
Route::get('/', [ControlladorSalones::class, 'home'])->name('home');

// Ruta para mostrar salones disponibles en una zona específica (opcional)
Route::get('/salones/{zona?}', [ControlladorSalones::class, 'salones_disponibles'])
    ->where('zona', '[A-Za-z]+')
    ->name('salones_disponibles');

// Ruta para la página de contacto con un número opcional
Route::get('/contacto/{numero?}', [ControlladorSalones::class, 'contact'])
    ->where('numero', '[0-9]+')
    ->name('contacto');
