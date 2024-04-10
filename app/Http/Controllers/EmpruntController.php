<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;
use App\Models\Livre;
use Illuminate\Support\Facades\Auth;

class EmpruntController extends Controller {
    // methode pour valider un emprunt de livre
    public function emprunter($id){
        // enregistrer l'emprunt dans la bd
        Emprunt::create([
            'date_debut' => date("Y-m-d"),
            'user_id' => Auth::user()->id,
            'livre_id' => $id
        ]);

        // modifier la disponiblite du livre
        $livre = Livre::find($id);
        $livre->disponibilite = false;
        $livre->save();

        return redirect()->back(); // rediriger vers la page precedente
    }

    // methode pour restituer un livre
    public function restituer($emprunt, $livre){
        // on recuperer l'emprunt concerner
        $emprunt = Emprunt::find($emprunt);
        $emprunt->date_fin = date("Y-m-d"); // modifier la date de fin
        $emprunt->save(); // valider les modifications dans la base de donnees

        $livre = Livre::find($livre); // recuperer le livre concerner
        $livre->disponibilite = true; // modifier la disponibilite
        $livre->save(); // enregistrer les modifications dans la bd

        return redirect()->back(); // rediriger vers la page precedente
    }
}
