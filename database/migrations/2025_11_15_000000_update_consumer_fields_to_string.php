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
        Schema::table('consumers', function (Blueprint $table) {
            // Change 'industry' from enum to string
            $table->string('industry')->change();
            // Change 'services' from enum to string
            $table->string('services')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consumers', function (Blueprint $table) {
            // Revert 'industry' to string (as reverting to enum without original values is complex)
            $table->string('industry')->change();
            // Revert 'services' to string
            $table->string('services')->change();
        });
    }
};
