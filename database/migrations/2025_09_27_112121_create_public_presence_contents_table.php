<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('public_presence_contents', function (Blueprint $table) {
            $table->id();
            $table->string('head_img')->nullable();
            $table->string('INSIGHT_DRIVEN_STRATEGY')->nullable();
            $table->text('desc_INSIGHT_DRIVEN_STRATEGY')->nullable();
            $table->string('img_INSIGHT_DRIVEN_STRATEGY')->nullable();
            $table->string('Creative_and_Channel_Synergy')->nullable();
            $table->text('desc_Creative_and_Channel_Synergy')->nullable();
            $table->string('img_Creative_and_Channel_Synergy')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('public_presence_contents');
    }
};
