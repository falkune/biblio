<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->bigInteger('isbn')->unique();
            $table->unsignedBigInteger('auteur_id');
            $table->string('image');
            $table->date('annee_de_sortie');
            $table->timestamps();
            $table->boolean('disponibilite')->default(true);

            $table->foreign('auteur_id')->references('id')->on('auteurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
