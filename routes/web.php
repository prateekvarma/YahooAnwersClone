<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('questions', QuestionController::class);
Auth::routes();
Route::resource('answers', AnswersController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{user}', [HomeController::class, 'profile'])->name('profile');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');