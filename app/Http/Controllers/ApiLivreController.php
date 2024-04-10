<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class ApiLivreController extends Controller {
    public function tousLesLivres(){
        $livre = Livre::all();
        return response()->json(['livres' => $livre]);
    }
}
