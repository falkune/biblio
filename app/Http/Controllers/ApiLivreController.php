<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class ApiLivreController extends Controller {
    // methode pour retourner tous les livre
    public function tousLesLivres(){
        $livre = Livre::all();
        return response()->json(['livres' => $livre]);
    }

    // methode pour creer un livre
    public function createBook(){
        //completer la fonction
    }

    // methode pour creer un nouveau livre
    public function store(Request $request){

        // return response()->json($request);
        // generer l'isbn
        $isbn = date('YmdHis');

        // sauvegarde l'image dans le dossier uploads de public
        $image = $request->file('photo');
        $imgName = time(). '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imgName);

        $livre = Livre::create([
            'titre' => $request->input('titre'),
            'isbn' => $isbn,
            'auteur_id' => $request->input('auteur'),
            'annee_de_sortie' => $request->input('annee_sortie'),
            'image' => $imgName
        ]);

        return response()->json([ 'status' => 201, 'message' => 'created' ]);
    }
}
