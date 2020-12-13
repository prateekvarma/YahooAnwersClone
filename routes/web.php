<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswersController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('questions', QuestionController::class);
Auth::routes();
Route::resource('answers', AnswersController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
