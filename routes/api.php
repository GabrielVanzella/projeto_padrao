<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LivroController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('livros')->group(function () {
    Route::post('/', [LivroController::class, 'index']);
    Route::post('/store', [LivroController::class, 'store']);
    Route::post('/show/{id}', [LivroController::class, 'show']);
    Route::post('/update/{id}', [LivroController::class, 'update']);
    Route::post('/del/{id}', [LivroController::class, 'destroy']);
});
