<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('url', 2048);
            $table->string('session_id');
            $table->date('visited_at');
            $table->nullableMorphs('visitable');
            $table->timestamps();
        });

        // Manually create a composite index with a specified length for the URL column
        DB::statement('ALTER TABLE page_views ADD INDEX page_views_index(url(255), session_id, visited_at);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
