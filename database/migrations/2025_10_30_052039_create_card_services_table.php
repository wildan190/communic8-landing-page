<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('card_services', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_id');
            $table->text('desc_en');
            $table->text('desc_id');
            $table->string('img');
            $table->string('route_name'); // nama route dinamis
            $table->string('button_en');
            $table->string('button_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_services');
    }
};
