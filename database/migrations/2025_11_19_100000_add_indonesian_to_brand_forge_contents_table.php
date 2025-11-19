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
        Schema::table('brand_forge_contents', function (Blueprint $table) {
            $table->string('insight_strategy_driven_id')->nullable()->after('insight_strategy_driven');
            $table->text('desc_insight_strategy_driven_id')->nullable()->after('desc_insight_strategy_driven');
            $table->string('bold_creative_ideas_id')->nullable()->after('bold_creative_ideas');
            $table->text('desc_bold_creative_ideas_id')->nullable()->after('desc_bold_creative_ideas');
            $table->string('impactful_visual_identity_id')->nullable()->after('impactful_visual_identity');
            $table->text('desc_impactful_visual_identity_id')->nullable()->after('desc_impactful_visual_identity');
            $table->text('align_strategic_foundation_id')->nullable()->after('align_strategic_foundation');
            $table->text('build_constructing_the_brand_world_id')->nullable()->after('build_constructing_the_brand_world');
            $table->text('maintain_ensuring_lasting_relevance_id')->nullable()->after('maintain_ensuring_lasting_relevance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brand_forge_contents', function (Blueprint $table) {
            $table->dropColumn([
                'insight_strategy_driven_id',
                'desc_insight_strategy_driven_id',
                'bold_creative_ideas_id',
                'desc_bold_creative_ideas_id',
                'impactful_visual_identity_id',
                'desc_impactful_visual_identity_id',
                'align_strategic_foundation_id',
                'build_constructing_the_brand_world_id',
                'maintain_ensuring_lasting_relevance_id',
            ]);
        });
    }
};
