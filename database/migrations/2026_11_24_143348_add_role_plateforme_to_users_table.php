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
    Schema::table('users', function (Blueprint $table) {
        // null = client Sitael ou apprenant ; 'admin' ou 'formateur' = équipe dpo.bj
        $table->string('role_plateforme', 20)->nullable()->after('email');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role_plateforme');
    });
}
};
