<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_architecture_contents', function (Blueprint $table) {
            $table->id();
            $table->string('head_img')->nullable();
            $table->string('img_services')->nullable();
            $table->string('title1')->nullable();
            $table->text('value_title1')->nullable();
            $table->string('title2')->nullable();
            $table->text('value_title2')->nullable();
            $table->string('title3')->nullable();
            $table->text('value_title3')->nullable();
            $table->string('title4')->nullable();
            $table->text('value_title4')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_architecture_contents');
    }
};
