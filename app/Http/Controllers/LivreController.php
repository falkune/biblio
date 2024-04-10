<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Auteur;

class LivreController extends Controller {

    public function tousLesLivres(){
        $livres = Livre::all();

        return view('home', compact('livres'));
    }


    public function index(){
        $auteurs = Auteur::all();
        return view('ajoutlivre', ['auteurs' => $auteurs]);
    }

    public function store(Request $request){
        // genrerer l'isbn
        $isbn = date('YmdHis');

        // sauvegarde l'image dans le dossier uploads de public
        $image = $request->file('photo');
        $imgName = time(). '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imgName);

        // enregistrer le livre
        $livre = Livre::create([
            'titre' => $request->input('titre'),
            'isbn' =>  $isbn,
            'auteur_id' => $request->input('auteur'),
            'annee_de_sortie' => $request->input('date'),
            'image' => $imgName
        ]);

        return back()->with('error', 'Livre Ajouté...');
    }

    // methode qui retourne les information d'un livre
    public function detailsLivre($id){
        $livre = Livre::find($id);
        return view('details', ['livre' => $livre]);
    }

    // methode pour modifier un livre
    public function showUpdateForm($id){
        $auteurs = Auteur::all();
        return view('update', ['auteurs' => $auteurs, 'id' => $id]);
    }

    // methode pour enregistrer les modification sur un livre
    public function updateBook(Request $request){
        $livre = Livre::find($request->input('id'));

         // sauvegarde l'image dans le dossier uploads de public
        $image = $request->file('photo');
        $imgName = time(). '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imgName);

        $livre->titre = $request->input('titre');
        $livre->auteur_id = $request->input('auteur');
        $livre->annee_de_sortie = $request->input('date');
        $livre->image = $imgName;

        // enregistrer les modification dans la bd
        $livre->save();
    }

    // methode pour supprimer un livre
    public function delete($id){
        $livre = Livre::find($id);
        $livre->delete();
    }

}
