<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasActionsTable extends Migration
{
    public function up()
    {
        Schema::create('ideas_actions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('img_upload')->nullable();
            $table->unsignedBigInteger('portfolio_detail_id');
            $table->timestamps();

            $table->foreign('portfolio_detail_id')
                ->references('id')
                ->on('portfolio_details')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ideas_actions');
    }
}
