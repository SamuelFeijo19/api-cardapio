<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TipoProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser'])->name('login');


// Grupo de rotas protegidas pelo middleware 'auth:sanctum'
Route::middleware(['auth:sanctum'])->group(function () {
    // Essas rotas exigem autenticação
    Route::get('/hello', function (Request $request) {
        return response()->json(['message' => 'Hello, authenticated user!']);
    });

    // Exemplo: Obter detalhes do usuário autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    //INICIO ROTAS PARA TIPO DE PRODUTO
    Route::get('/tipo_produto', [TipoProdutoController::class, 'index']);
    Route::get('/tipo_produto/{id}', [TipoProdutoController::class, 'show']);
    Route::post('/tipo_produto', [TipoProdutoController::class, 'store']);
    Route::put('/tipo_produto/{id}', [TipoProdutoController::class, 'update']);
    Route::delete('/tipo_produto/{id}', [TipoProdutoController::class, 'destroy']);
    //FIM ROTAS PARA TIPO DE PRODUTO

    //INICIO ROTAS DE PRODUTOS
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
    Route::post('/produtos', [ProdutoController::class, 'store']);
    Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);
    //FIM ROTAS PARA PRODUTOS
});
