<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
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

Route::post('/login', [AuthController::class, 'login'])->name('login'); // Adicionando o nome da rota
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register-admin', [AdminUserController::class, 'registerAdminUser']);

// Grupo de rotas protegidas pelo middleware 'auth:sanctum'
Route::middleware(['auth:sanctum'])->group(function () {
    // Essas rotas exigem autenticação
    Route::get('/hello', function (Request $request) {
        return response()->json(['message' => 'Hello, authenticated user!']);
    });

    // Outras rotas protegidas...

    // Exemplo: Obter detalhes do usuário autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
