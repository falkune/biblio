<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\Emprunt;
use App\Notifications\ActivateEmailLink;

class UserController extends Controller {
    // cette fonction retourne le formulaire d'inscription
    public function index(){
        return view('inscription');
    }

    // cette fonction sauvegarder les informations de l'utilisateur dans la bd
    public function store(Request $request){
        // validation des donnees
        $validateData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
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

        $user = User::create([
            'nom' => $validateData['nom'],
            'prenom' => $validateData['prenom'],
            'type' => $type,
            'email' => $validateData['email'],
            'numero_adherant' => $numeroAdherent,
            'password' => Hash::make($validateData['password']),
        ]);

        // envoie de mail d'activation
        // event(new Registered($user));
        $user->notify(new ActivateEmailLink);

    }

    public function verification($id, $hash){
        $user = User::findOrFail($id);
        $user->markEmailAsVerified();
        return view('emailverify');
    }
    # methode pour envoyer un nouveau lien de verification
    public function sendNewLink(Request $request){
        $user = User::where('email', $request->input('email'))->first();
        $user->notify(new ActivateEmailLink);
    }

    # methode pour connecter l'utilisateur
    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back();
    }

    # methode pour deconnecter l'utilisateur
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // methode pour afficher la page d'accueil
    public function home($id){
        $emprunts = Emprunt::where('user_id', $id)->get();
        return view('accueil', ['emprunts' => $emprunts]);
    }

}
