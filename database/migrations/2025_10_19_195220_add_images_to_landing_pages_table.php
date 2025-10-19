<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->string('img_1')->nullable()->after('img');
            $table->string('img_2')->nullable()->after('img_1');
            $table->string('img_3')->nullable()->after('img_2');
            $table->string('img_4')->nullable()->after('img_3');
            $table->string('img_5')->nullable()->after('img_4');
        });
    }

    public function down(): void
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn(['img_1','img_2','img_3','img_4','img_5']);
        });
    }
};
