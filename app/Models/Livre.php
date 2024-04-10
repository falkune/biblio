<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'isbn',
        'auteur_id',
        'annee_de_sortie',
        'image',
    ];

    public function emprunts(){
        return $this->hasMany(Emprunt::class);
    }

    public function auteur(){
        return $this->belongsTo(Auteur::class);
    }
}
