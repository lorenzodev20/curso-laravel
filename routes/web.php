<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Esta es la forma nueva de llamar a los controladores en laravel 8
Route::get('/',[PageController::class,'home'])->name('home');
Route::get('curso/{course:slug}',[PageController::class,'course'])->name('course');

// Route::get('/home')

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
