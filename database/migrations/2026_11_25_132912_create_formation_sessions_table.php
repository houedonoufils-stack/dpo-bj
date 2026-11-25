<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formation_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('formateur_id')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('debut');
            $table->dateTime('fin');
            $table->string('lien_visio')->nullable();
            $table->unsignedSmallInteger('places')->nullable();  // null = sans limite
            $table->string('statut', 20)->default('planifiee');   // planifiee, terminee, annulee
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formation_sessions');
    }
};