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
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->text('section1_en')->nullable();
            $table->text('section1_id')->nullable();
            $table->text('section2_en')->nullable();
            $table->text('section2_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn('section1_en');
            $table->dropColumn('section1_id');
            $table->dropColumn('section2_en');
            $table->dropColumn('section2_id');
        });
    }
};
