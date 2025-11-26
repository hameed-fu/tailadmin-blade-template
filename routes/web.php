<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})->middleware(['auth'])->name('dashboard');

Route::get('users',[UserController::class,'index'])->name('users.index');
Route::get('users/create',[UserController::class,'create'])->name('users.create');
Route::get('users/edit/{id}',[UserController::class,'edit'])->name('users.edit');

require __DIR__.'/auth.php';
