<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_session_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // compte apprenant (étape suivante)
            $table->string('nom', 150);
            $table->string('email', 190);
            $table->string('statut', 20)->default('inscrit');      // inscrit, present, absent, annule
            $table->timestamps();

            $table->unique(['formation_session_id', 'email']);     // pas deux fois la même personne
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};