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
            $table->text('hero_title_id')->nullable()->after('hero_title');
            $table->text('description_id')->nullable()->after('description');
            $table->text('project_analysis_id')->nullable()->after('project_analysis');
            $table->text('challenges_and_insight_id')->nullable()->after('challenges_and_insight');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_details', function (Blueprint $table) {
            $table->dropColumn('hero_title_id');
            $table->dropColumn('description_id');
            $table->dropColumn('project_analysis_id');
            $table->dropColumn('challenges_and_insight_id');
        });
    }
};
