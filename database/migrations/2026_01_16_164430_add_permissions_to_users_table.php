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
            // On ajoute la colonne permissions en JSON
            // nullable() permet d'éviter des erreurs si tu as déjà des utilisateurs en base
            // after('password') place la colonne au bon endroit visuellement
            $table->json('permissions')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Toujours prévoir le rollback : supprimer la colonne si on annule la migration
            $table->dropColumn('permissions');
        });
    }
};
