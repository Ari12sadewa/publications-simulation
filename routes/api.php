<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublikasiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    // Publikasi
    Route::post('/publikasi', [PublikasiController::class, 'store']);
    Route::get('/publikasi', [PublikasiController::class, 'index']);
    Route::put('/publikasi/{id}', [PublikasiController::class, 'update']);
    Route::delete('/publikasi/{id}',[PublikasiController::class, 'delete']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});

// Route::get('/login', function () {
//     return response()->json(['message' => 'Unauthorized.'], 401);
// })->name('login');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });  

