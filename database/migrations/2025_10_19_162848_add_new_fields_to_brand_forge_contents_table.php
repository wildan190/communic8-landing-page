<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brand_forge_contents', function (Blueprint $table) {
            $table->string('img_framework')->nullable()->after('img_impactful_visual_identity');
            $table->text('align_strategic_foundation')->nullable()->after('img_framework');
            $table->text('build_constructing_the_brand_world')->nullable()->after('align_strategic_foundation');
            $table->text('maintain_ensuring_lasting_relevance')->nullable()->after('build_constructing_the_brand_world');
        });
    }

    public function down(): void
    {
        Schema::table('brand_forge_contents', function (Blueprint $table) {
            $table->dropColumn([
                'img_framework',
                'align_strategic_foundation',
                'build_constructing_the_brand_world',
                'maintain_ensuring_lasting_relevance',
            ]);
        });
    }
};
