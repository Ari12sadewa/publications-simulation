<?php

// use Illuminate\Support\Facades\Route;
// use function Laravel\Prompts\select;

// Route::get('/db-test', function () {
//     return DB::select('SELECT * FROM users');
// });

use Illuminate\Support\Facades\Route;
    
Route::get('/login', function () {
    return response()->json(['message' => 'Unauthorized.'], 401);
})->name('login');