<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_details', function (Blueprint $table) {
            $table->id();
            $table->string('bg_hero')->nullable();
            $table->string('hero_title');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->text('description')->nullable();
            $table->string('delivery')->nullable();
            $table->string('img')->nullable();
            $table->text('project_analysis')->nullable();
            $table->text('challenges_and_insight')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_details');
    }
};
