<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EnglishTestController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AuthController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/reminders', [HomeController::class, 'remindersAll'])->name('reminders');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister'])->name('doRegister');
Route::post('/userMessage', [UserController::class, 'sendMessage']);

Route::middleware('isLoggedIn')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/answers/{id}', [UserController::class, 'getAnswers'])->name('answers');
    Route::post('/result', [UserController::class, 'testResult']);
    Route::resource('tests', EnglishTestController::class);
});

Route::middleware('isAdmin')->group(function(){
    Route::get('/admin', [AdminController::class, 'adminPanel'])->name('admin');
    Route::post('/category', [AdminController::class, 'createCategory'])->name('categoryInsert');
    Route::post('/reminder', [AdminController::class, 'createReminder'])->name('reminderInsert');
    Route::delete('/reminderDelete/{reminder}', [AdminController::class, 'deleteReminder'])->name('deleteReminder');
});
