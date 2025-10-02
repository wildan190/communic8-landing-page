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
        Schema::table('web_information', function (Blueprint $table) {
            $table->text('meta_keywords')->nullable();
            $table->text('schema_markup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_information', function (Blueprint $table) {
            $table->dropColumn(['meta_keywords', 'schema_markup']);
        });
    }
};
