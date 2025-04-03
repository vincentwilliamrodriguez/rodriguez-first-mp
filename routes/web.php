<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) -> name('welcome');

Route::get('/movies', [MovieController::class, 'index']) -> name('movies');
