<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('phone')->nullable();

            // Rekomendasi industry enum (bisa disesuaikan)
            $table->enum('industry', [
                'Technology',
                'Finance',
                'Healthcare',
                'Education',
                'Retail',
                'Manufacturing',
                'Media & Entertainment',
                'Hospitality',
                'Government',
                'Other',
            ])->nullable();

            $table->enum('services', [
                'Brand Forge',
                'Digital Compass',
                'Public Presence',
                'Digital Architecture',
            ])->nullable();

            $table->enum('find_us', [
                'Instagram',
                'Facebook',
                'Website',
                'Linkedin',
                'Other',
            ])->nullable();

            // Area 1-4 (radio button)
            $table->enum('area', ['1', '2', '3', '4'])->nullable();

            $table->longText('message')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consumers');
    }
};
