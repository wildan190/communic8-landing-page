<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brand_forge_contents', function (Blueprint $table) {
            $table->id();
            $table->string('head_img')->nullable();
            $table->string('insight_strategy_driven')->nullable();
            $table->text('desc_insight_strategy_driven')->nullable();
            $table->string('img_insight_strategy_driven')->nullable();
            $table->string('bold_creative_ideas')->nullable();
            $table->text('desc_bold_creative_ideas')->nullable();
            $table->string('img_bold_creative_ideas')->nullable();
            $table->string('impactful_visual_identity')->nullable();
            $table->text('desc_impactful_visual_identity')->nullable();
            $table->string('img_impactful_visual_identity')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_forge_contents');
    }
};
