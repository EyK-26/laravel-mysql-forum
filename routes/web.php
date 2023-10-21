<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/questions/{question}', [QuestionController::class, 'show'])->whereNumber('question')->name('questions.show');
Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->whereNumber('question')->name('questions.edit');
Route::put('/questions/{question}', [QuestionController::class, 'update'])->whereNumber('question')->name('questions.update');
Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->whereNumber('question')->name('questions.destroy');

Route::get('/answers', [AnswerController::class, 'index'])->name('answers.index');
Route::get('/answers/create', [AnswerController::class, 'create'])->name('answers.create');
Route::post('/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('/answers/{answer}', [AnswerController::class, 'show'])->whereNumber('answer')->name('answers.show');
Route::get('/answers/{answer}/edit', [AnswerController::class, 'edit'])->whereNumber('answer')->name('answers.edit');
Route::put('/answers/{answer}', [AnswerController::class, 'update'])->whereNumber('answer')->name('answers.update');
Route::delete('/answers/{answer}', [AnswerController::class, 'destroy'])->whereNumber('answer')->name('answers.destroy');

Route::get('/users/{user}', [UserController::class, 'show'])->whereNumber('user')->name('users.show');
