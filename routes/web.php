<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\homeController::class, 'index'])->name('home');

Auth::routes();

//Rotas ADM
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home-admin');
Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'index'])->name('login-admin');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('login-admin-submit');
Route::post('/admin/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout-admin');


//Rotas Noticias
Route::get('/noticias/lista', [App\Http\Controllers\noticiaController::class, 'index'])->name('listaNoticias');
Route::get('/noticias/editar/{id}', [App\Http\Controllers\noticiaController::class, 'edit'])->name('editaNoticia');
Route::get('/noticias/deletar/{id}', [App\Http\Controllers\noticiaController::class, 'destroy'])->name('deletaNoticia');
Route::post('/noticias/{id}', [App\Http\Controllers\noticiaController::class, 'update'])->name('gravaEditaNoticia');
Route::get('/noticias/cadastrar', [App\Http\Controllers\noticiaController::class, 'create'])->name('novaNoticia');
Route::post('/noticias', [App\Http\Controllers\noticiaController::class, 'store'])->name('gravaNovaNoticia');

//Rotas Eventos
Route::get('/eventos/lista', [App\Http\Controllers\eventoController::class, 'index'])->name('listaEventos');
Route::get('/eventos/editar/{id}', [App\Http\Controllers\eventoController::class, 'edit'])->name('editaEvento');
Route::get('/eventos/deletar/{id}', [App\Http\Controllers\eventoController::class, 'destroy'])->name('deletaEvento');
Route::post('/eventos/{id}', [App\Http\Controllers\eventoController::class, 'update'])->name('gravaEditaEvento');
Route::get('/eventos/cadastrar', [App\Http\Controllers\eventoController::class, 'create'])->name('novoEvento');
Route::post('/eventos', [App\Http\Controllers\eventoController::class, 'store'])->name('gravaNovoEvento');

require __DIR__.'/auth.php';
