<?php

use App\Http\Controllers\GenerosController;
use App\Http\Controllers\MoviesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/movies' , MoviesController::class);
Route::apiResource('/genero' , GenerosController::class);