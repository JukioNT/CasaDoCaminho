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

Route::get('/register', [App\Http\Controllers\homeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('site.logout');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sobrenos', function () {
	return view('site.sobreNos');
});

Route::get('/ajudar', function () {
	return view('site.ajudar');
});

Route::get('/precisamos', function () {
	return view('site.precisa');
});

Route::get('/contato', function () {
	return view('site.contato');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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

//Rotas Colaboradores
Route::get('/colaboradores/lista', [App\Http\Controllers\colaboradorController::class, 'index'])->name('listaColaboradores');
Route::get('/colaboradores/editar/{id}', [App\Http\Controllers\colaboradorController::class, 'edit'])->name('editaColaborador');
Route::get('/colaboradores/deletar/{id}', [App\Http\Controllers\colaboradorController::class, 'destroy'])->name('deletaColaborador');
Route::post('/colaboradores/{id}', [App\Http\Controllers\colaboradorController::class, 'update'])->name('gravaEditaColaborador');
Route::get('/colaboradores/cadastrar', [App\Http\Controllers\colaboradorController::class, 'create'])->name('novoColaborador');
Route::post('/colaboradores', [App\Http\Controllers\colaboradorController::class, 'store'])->name('gravaNovoColaborador');

//Rotas Doações
Route::get('/doacoes/lista', [App\Http\Controllers\doacaoController::class, 'index'])->name('listaDoacoes');
Route::get('/doacoes/deletar/{id}', [App\Http\Controllers\doacaoController::class, 'destroy'])->name('deletaDoacao');
Route::post('/doacoes/{id}', [App\Http\Controllers\doacaoController::class, 'update'])->name('gravaEditaDoacoes');
Route::get('/doacoes/cadastrar', [App\Http\Controllers\doacaoController::class, 'create'])->name('novaDoacao');
Route::post('/doacoes', [App\Http\Controllers\doacaoController::class, 'store'])->name('gravaNovaDoacao');

//Rotas Tipo Doações
Route::get('/tipodoacoes/lista', [App\Http\Controllers\tipoDoacaoController::class, 'index'])->name('listaTipoDoacoes');
Route::get('/tipodoacoes/incrementaform/{id}', [App\Http\Controllers\tipoDoacaoController::class, 'form'])->name('formincrementaDoacoes');
Route::post('/tipodoacoes/incrementa/{id}', [App\Http\Controllers\tipoDoacaoController::class, 'increment'])->name('incrementaDoacoes');
Route::get('/tipodoacoes/cadastrar', [App\Http\Controllers\tipoDoacaoController::class, 'create'])->name('novoTipoDoacao');
Route::post('/tipodoacoes', [App\Http\Controllers\tipoDoacaoController::class, 'store'])->name('gravaNovoTipoDoacao');

//Rotas Filhos
Route::get('/filhos/lista', [App\Http\Controllers\filhoController::class, 'index'])->name('listaFilhos');
Route::get('/filhos/editar/{id}', [App\Http\Controllers\filhoController::class, 'edit'])->name('editaFilho');
Route::get('/filhos/deletar/{id}', [App\Http\Controllers\filhoController::class, 'destroy'])->name('deletaFilho');
Route::post('/filhos/{id}', [App\Http\Controllers\filhoController::class, 'update'])->name('gravaEditaFilho');
Route::get('/filhos/cadastrar', [App\Http\Controllers\filhoController::class, 'create'])->name('novoFilho');
Route::post('/filhos', [App\Http\Controllers\filhoController::class, 'store'])->name('gravaNovoFilho');

//Rotas Familias
Route::get('/familias/lista', [App\Http\Controllers\familiaController::class, 'index'])->name('listaFamilias');
Route::get('/familias/editar/{id}', [App\Http\Controllers\familiaController::class, 'edit'])->name('editaFamilia');
Route::get('/familias/info/{id}', [App\Http\Controllers\familiaController::class, 'indexInfo'])->name('infoFamilia');
Route::get('/familias/deletar/{id}', [App\Http\Controllers\familiaController::class, 'destroy'])->name('deletaFamilia');
Route::post('/familias/{id}', [App\Http\Controllers\familiaController::class, 'update'])->name('gravaEditaFamilia');
Route::get('/familias/cadastrar', [App\Http\Controllers\familiaController::class, 'create'])->name('novaFamilia');
Route::post('/familias', [App\Http\Controllers\familiaController::class, 'store'])->name('gravaNovaFamilia');

//Rotas Registrar
Route::get('/registrar', [App\Http\Controllers\registrarController::class, 'form'])->name('registrarColaborador');
Route::post('/registrar/salvar', [App\Http\Controllers\registrarController::class, 'store'])->name('registraNovoColaborador');
Route::post('/registrar/participar', [App\Http\Controllers\registrarController::class, 'participar'])->name('pariticparEvento');




require __DIR__.'/auth.php';