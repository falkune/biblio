<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\EmpruntController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LivreController::class, 'tousLesLivres']);

Route::get('/inscription', [UserController::class, 'index']);

Route::post('/inscription', [UserController::class, 'store']);

Route::get('/email/verify', [UserController::class, 'notice'])
	->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verification'])
    ->middleware(['verifyemail', 'signed'])
    ->name('verification.verify');

Route::get('/expirelink', function() {
    return view('expirelink');
})->name('link.expire');

Route::post('newlink', [UserController::class, 'sendNewLink'])->name('get.new.link');

Route::get('/connexion', function(){
    return view('connexion');
});

Route::post('/connexion', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

// cette route permet d'afficher le formulaire
Route::get('/ajout-livre', [LivreController::class, 'index']);
// route pour valider le formulaire
Route::post('/ajout-livre', [LivreController::class, 'store']);
// Route pour afficher les details du livre
Route::get('/detais/{id}', [LivreController::class, 'detailsLivre'])->name('details');
// Route pour permettre l'emprunt d'un livre
Route::get('/emprunter/{id}', [EmpruntController::class, 'emprunter'])->name('emprunter');
// Route pour supprimer un livre
Route::get('/delete/{id}', [LivreController::class, 'delete'])->name('delete');
// Route pour afficher le formulaire de modification d'un livre
Route::get('/update/{id}', [LivreController::class, 'showUpdateForm'])->name('update-form');
// Route pour enregistrer les modifications sur un livre
Route::post('/update', [LivreController::class, 'updateBook']);
// Route pour afficher la page d'accueil d'un adherant
Route::get('/accueil/{id}', [UserController::class, 'home'])->name('accueil');
// Route pour restituer un livre
Route::get('/restituer/{id_emprunt}/{id_livre}', [EmpruntController::class, 'restituer'])->name('restituer');
