<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class ApiUserController extends Controller {
    // methode pour creer un nouvel utilisateur
    public function register(Request $request){

        // initial correspond aux initiales de l'utilisateur en majuscule
        $initial = strtoupper($request->input('nom')[0].$request->input('prenom')[0]);

        $nombre = [];
        // tant que le tableau ($nombre) ne contient pas 5 elements
        for($i = 0; $i < 4; $i++){
            $rand = rand(0, 9); // generer un nombre aleatoire entre 0 et 9
            $nombre[] = $rand; // mettre le nombre aleatoire dans le tableau
        }
        // convertir le tableau en chaine caractere
        $str = implode('',$nombre);
        // le numero adherent est la concatenation entre $initial et $str
        $numeroAdherent = $initial.$str;
        // enregistrer l'utilisateur

        $type = 'adherent';

        $cryptedpassword = Hash::make($request->input('password'));

        $user = User::create([
            'nom'   => $request->input('nom'),
            'prenom'  => $request->input('prenom'),
            'email'  => $request->input('email'),
            'password'  => $cryptedpassword,
            'type'  => $type,
            'numero_adherant' => $numeroAdherent
        ]);

        return response()->json(['message' => "user created"]);
    }
}
