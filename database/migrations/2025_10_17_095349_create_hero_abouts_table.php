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
        Schema::create('hero_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('box_img')->nullable();
            $table->text('about_us')->nullable();
            $table->string('philosophy_title_1')->nullable();
            $table->text('content_philosophy_title_1')->nullable();
            $table->string('philosophy_title_2')->nullable();
            $table->text('content_philosophy_title_2')->nullable();
            $table->string('philosophy_title_3')->nullable();
            $table->text('content_philosophy_title_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_abouts');
    }
};
