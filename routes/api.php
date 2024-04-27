<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLivreController;
use App\Http\Controllers\ApiUserController;


// Route pour recuperer tous les livres
Route::get('/', [ApiLivreController::class, 'tousLesLivres']);
// Route pour creer un utilisateur
Route::post('/inscription', [ApiUserController::class, 'register']);
// Route pour creer un livre
Route::post('/ajout-livre', [ApiLivreController::class, 'store']);
// Route pour afficher les infos d'un livre connaisant son id
Route::get('/detais/{id}', [ApiLivreController::class, 'livreInfos']);
// Route pour emprunter un livre
