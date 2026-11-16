<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\WalkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/walks', [WalkController::class, 'index'])->name('walks.index');
Route::get('/walks/{walk:slug}', [WalkController::class, 'show'])->name('walks.show');

Route::get('/journal', [ArticleController::class, 'index'])->name('journal.index');
Route::get('/journal/{article:slug}', [ArticleController::class, 'show'])->name('journal.show');

Route::get('/estimate', [EstimateController::class, 'index'])->name('estimate');

Route::get('/idea', [SuggestionController::class, 'create'])->name('suggestions.create');
Route::post('/idea', [SuggestionController::class, 'store'])->middleware('throttle:5,1')->name('suggestions.store');

Route::view('/about', 'pages.about')->name('about');
