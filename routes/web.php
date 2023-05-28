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

Route::get('/', function () {
    return view('site.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/noticias/lista', [App\Http\Controllers\noticiaController::class, 'index'])->name('listaNoticias');
Route::get('/noticias/editar/{id}', [App\Http\Controllers\noticiaController::class, 'edit'])->name('editaNoticia');
Route::get('/noticias/deletar/{id}', [App\Http\Controllers\noticiaController::class, 'destroy'])->name('deletaNoticia');
Route::post('/noticias/{id}', [App\Http\Controllers\noticiaController::class, 'update'])->name('gravaEditaNoticia');
Route::get('/noticias/cadastrar', [App\Http\Controllers\noticiaController::class, 'create'])->name('novaNoticia');
Route::post('/noticias', [App\Http\Controllers\noticiaController::class, 'store'])->name('gravaNovaNoticia');

require __DIR__.'/auth.php';
