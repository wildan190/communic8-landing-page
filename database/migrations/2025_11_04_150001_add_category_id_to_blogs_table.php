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
        Schema::table('blogs', function (Blueprint $table) {
            // Add category_id column
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');

            // Remove the old category string column
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Re-add the old category string column
            $table->string('category')->nullable();

            // Drop the foreign key and column
            $table->dropConstrainedForeignId('category_id');
        });
    }
};
