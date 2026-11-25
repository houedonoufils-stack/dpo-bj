<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();             // identifiant dans les adresses
            $table->string('titre');
            $table->string('public')->nullable();         // à qui s'adresse la formation
            $table->string('duree', 50)->nullable();      // ex. « 1 jour »
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);     // visible sur le site ou non
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};