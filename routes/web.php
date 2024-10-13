<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlladorSalones;
use App\Http\Requests\CreateMessageRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/',['as' => 'home', function () {
]);*/
/*Route::get('contacto',['as' => 'contactos', function () {
return view('contactos');
// return "Hola desde la pag de contacto";
}]);*/
/*Route::get('saludos/{nombre?}', function ($nombre="Invitado") {
//return view('welcome');
return "Saludos $nombre";
});*/
Route::get('/', [ControlladorSalones::class, 'home'])->name('home');
//Route::post('contacto', [ControlladorSalones::class, 'mensaje']);
//Route::get('contactos', [ControlladorSalones::class, 'contact'])->name('contactos');
Route::get('saludos/{nombre?}', [ControlladorSalones::class, 'saludos'])->where('nombre', "[A-Za-z]+")->name('saludos');
//Route::resource('messages', CreateMessageRequest::class);
Route::get('messages/create', [CreateMessageRequest::class, 'create'])->name('messages.create');
Route::get('messages', [CreateMessageRequest::class, 'index'])->name('messages.index');
Route::get('messages/{id?}/edit/', [CreateMessageRequest::class, 'edit'])->name('messages.edit');
Route::put('messages/{id}', [CreateMessageRequest::class, 'update'])->name('messages.update');

Route::get('messages/{id?}', [CreateMessageRequest::class, 'show'])->name('messages.show');
Route::post('messages', [CreateMessageRequest::class, 'store'])->name('messages.store');
Route::delete('messages/{id?}', [CreateMessageRequest::class, 'destroy'])->name('messages.destroy');
/*
Route::get('/', [ControlladorSalones::class, 'home'])->name('home');
Route::get('contactos', [ControlladorSalones::class, 'contact'])->name('contactos');

*/
/*
Route::get('saludos/{nombre?}', function ($nombre = "Invitado") {
return view('saludos', compact('nombre'));
})->where('nombre', "[A-Za-z]+")->name('saludos');
*/
/*
Route::get('contactame',['as'=>'contacto',function(){
return 'seccion contactarr';
}]);
*/use App\Http\Controllers\MessagesController;

Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessagesController::class, 'create'])->name('messages.create');
Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');
Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('messages.show');
Route::get('/messages/{id}/edit', [MessagesController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{id}', [MessagesController::class, 'update'])->name('messages.update');
Route::delete('/messages/{id}', [MessagesController::class, 'destroy'])->name('messages.destroy');
