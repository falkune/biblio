<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'user_id',
        'livre_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function livre(){
        return $this->belongsTo(Livre::class);
    }

}
