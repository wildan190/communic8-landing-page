<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('banner_text')->nullable();
            $table->string('img')->nullable();
            $table->string('title_text1')->nullable();
            $table->text('description1')->nullable();
            $table->string('title_text2')->nullable();
            $table->text('description2')->nullable();
            $table->string('title_text3')->nullable();
            $table->text('description3')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};
