<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLivreController;
use App\Http\Controllers\ApiUserController;


// Route pour recuperer tous les livres
Route::get('/', [ApiLivreController::class, 'tousLesLivres']);
Route::post('/inscription', [ApiUserController::class, 'register']);
