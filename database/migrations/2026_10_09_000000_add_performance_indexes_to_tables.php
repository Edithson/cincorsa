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
        Schema::table('articles', function (Blueprint $table) {
            $table->index(['public', 'created_at'], 'articles_public_created_at_index');
            $table->index('user_id', 'articles_user_id_index');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->index(['is_read', 'created_at'], 'contacts_is_read_created_at_index');
            $table->index('service', 'contacts_service_index');
        });

        Schema::table('laws', function (Blueprint $table) {
            $table->index('created_at', 'laws_created_at_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex('articles_public_created_at_index');
            $table->dropIndex('articles_user_id_index');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex('contacts_is_read_created_at_index');
            $table->dropIndex('contacts_service_index');
        });

        Schema::table('laws', function (Blueprint $table) {
            $table->dropIndex('laws_created_at_index');
        });
    }
};
