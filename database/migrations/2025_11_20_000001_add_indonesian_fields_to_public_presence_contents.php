<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('public_presence_contents', function (Blueprint $table) {
            $table->string('INSIGHT_DRIVEN_STRATEGY_id')->nullable()->after('INSIGHT_DRIVEN_STRATEGY');
            $table->text('desc_INSIGHT_DRIVEN_STRATEGY_id')->nullable()->after('desc_INSIGHT_DRIVEN_STRATEGY');

            $table->string('Creative_and_Channel_Synergy_id')->nullable()->after('Creative_and_Channel_Synergy');
            $table->text('desc_Creative_and_Channel_Synergy_id')->nullable()->after('desc_Creative_and_Channel_Synergy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('public_presence_contents', function (Blueprint $table) {
            $table->dropColumn([
                'INSIGHT_DRIVEN_STRATEGY_id',
                'desc_INSIGHT_DRIVEN_STRATEGY_id',
                'Creative_and_Channel_Synergy_id',
                'desc_Creative_and_Channel_Synergy_id',
            ]);
        });
    }
};
