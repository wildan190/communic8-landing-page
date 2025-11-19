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
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->string('title_id')->nullable()->after('title');
            $table->string('subtitle_id')->nullable()->after('subtitle');
            $table->string('banner_text_id')->nullable()->after('banner_text');
            $table->text('description1_id')->nullable()->after('description1');
            $table->string('title_text1_id')->nullable()->after('title_text1');
            $table->text('description2_id')->nullable()->after('description2');
            $table->string('title_text2_id')->nullable()->after('title_text2');
            $table->text('description3_id')->nullable()->after('description3');
            $table->string('title_text3_id')->nullable()->after('title_text3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn('title_id');
            $table->dropColumn('subtitle_id');
            $table->dropColumn('banner_text_id');
            $table->dropColumn('description1_id');
            $table->dropColumn('title_text1_id');
            $table->dropColumn('description2_id');
            $table->dropColumn('title_text2_id');
            $table->dropColumn('description3_id');
            $table->dropColumn('title_text3_id');
        });
    }
};
