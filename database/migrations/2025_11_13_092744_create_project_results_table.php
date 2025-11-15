<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_results', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('portfolio_detail_id');
            $table->text('description')->nullable();
            $table->string('result_img')->nullable();
            $table->timestamps();

            $table->foreign('portfolio_detail_id')
                  ->references('id')->on('portfolio_details')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_results');
    }
};
