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
        Schema::table('digital_architecture_contents', function (Blueprint $table) {
            $table->string('title1_id')->nullable()->after('value_title1');
            $table->text('value_title1_id')->nullable()->after('title1_id');
            $table->string('title2_id')->nullable()->after('value_title2');
            $table->text('value_title2_id')->nullable()->after('title2_id');
            $table->string('title3_id')->nullable()->after('value_title3');
            $table->text('value_title3_id')->nullable()->after('title3_id');
            $table->string('title4_id')->nullable()->after('value_title4');
            $table->text('value_title4_id')->nullable()->after('title4_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('digital_architecture_contents', function (Blueprint $table) {
            $table->dropColumn('title1_id');
            $table->dropColumn('value_title1_id');
            $table->dropColumn('title2_id');
            $table->dropColumn('value_title2_id');
            $table->dropColumn('title3_id');
            $table->dropColumn('value_title3_id');
            $table->dropColumn('title4_id');
            $table->dropColumn('value_title4_id');
        });
    }
};
