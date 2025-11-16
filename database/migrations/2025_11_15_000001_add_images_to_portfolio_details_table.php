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
        Schema::table('portfolio_details', function (Blueprint $table) {
            $table->string('img_project_analysis')->nullable()->after('project_analysis');
            $table->string('img_challenges_and_insight')->nullable()->after('challenges_and_insight');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_details', function (Blueprint $table) {
            $table->dropColumn('img_project_analysis');
            $table->dropColumn('img_challenges_and_insight');
        });
    }
};
