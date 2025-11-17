<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/create-user', [UserController::class, 'create'])->name('user.create');

// Solicitar link para resetar senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Formulário para redefinir a senha com o token
Route::get('/reset-password', [ForgotPasswordController::class, 'showRequestForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/index-user', [UserController::class, 'index'])->name('user.index');

    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');

    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');

    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');

    Route::get('/edit-password/{user}', [UserController::class, 'edit_password'])->name('password.edit');
    Route::put('/update-password/{user}', [UserController::class, 'update_password'])->name('password.update');

    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/generate-pdf-user/{user}', [UserController::class, 'generatePdf'])->name('user.generate-pdf');

    Route::get('/generate-pdf-users', [UserController::class, 'generatePdfUsers'])->name('user.generate-pdf-users');

    Route::get('/generate-csv-users', [UserController::class, 'generateCSVUsers'])->name('user.generate-csv-users');
});
