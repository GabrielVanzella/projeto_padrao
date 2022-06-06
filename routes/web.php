<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ConsumirApi;
use App\Http\Controllers\Teste;
use App\Http\Controllers\Teste\MinhaClasse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//passagem de parametros estaticos
//Route::view('/cads', 'cadastro', ['name'=>'Gabriel']);
//apenas texto na rota
//->where('name', '[A-Za-z]+');
//apenas numeros
//->where('id', '[0-9]+');
//passagem de dois parametros
//Route::get('/cads/{id?}/{name?}', function($id = null, $name = null){
//return view('cadastro', ['pessoa_id'=>$id, 'pessoa_nome'=>$name]);
//})->where(['id'=> '[0-9]+', 'name' => '[a-z]+']);
// passando de cadastro para index (routes com views)

Route::get('/', [HomeController::class, 'index']);
Route::prefix('cadastro')->group(function () {
    Route::get('/', [CadastroController::class, 'index'])->name('cadastros-index');
    Route::get('/create', [CadastroController::class, 'create'])->name('cadastros-create');
    Route::post('/', [CadastroController::class, 'store'])->name('cadastros-store');
    Route::get('/{id}/edit', [CadastroController::class, 'edit'])->name('cadastros-edit');
    Route::put('/{id}', [CadastroController::class, 'update'])->name('cadastros-update');
    Route::delete('/{id}', [CadastroController::class, 'destroy'])->name('cadastros-destroy');
});

//Route::get('/{id}/teste', [CadastroController::class, 'validacpf'])->name('cadastros-edit');
Route::get('/api', [ConsumirApi::class, 'consumir_api'])->name('api');

Route::fallback(function () {
    return "Erro de rota";
});
