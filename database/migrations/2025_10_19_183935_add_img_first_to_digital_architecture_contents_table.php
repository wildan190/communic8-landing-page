<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('digital_architecture_contents', function (Blueprint $table) {
            $table->string('img_first')->nullable()->after('img_services');
        });
    }

    public function down(): void
    {
        Schema::table('digital_architecture_contents', function (Blueprint $table) {
            $table->dropColumn('img_first');
        });
    }
};
