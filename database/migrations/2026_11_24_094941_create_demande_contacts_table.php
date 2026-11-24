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
    Schema::create('demande_contacts', function (Blueprint $table) {
        $table->id();
        $table->string('nom', 150);
        $table->string('organisation', 150);
        $table->string('email', 190);
        $table->string('telephone', 20)->nullable();           // facultatif (minimisation)
        $table->string('objet', 50);
        $table->text('message')->nullable();

        // Preuve du consentement à la prospection (art. 390 et section 3.6)
        $table->boolean('consentement_prospection')->default(false);
        $table->text('consentement_texte')->nullable();       // le texte exact présenté
        $table->timestamp('consentement_le')->nullable();     // la date de l'accord

        $table->timestamps();                                 // created_at et updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_contacts');
    }
};
