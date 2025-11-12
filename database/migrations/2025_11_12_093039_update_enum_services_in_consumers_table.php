<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update kolom `services` dengan semua nilai service yang sekarang digunakan
        DB::statement("
            ALTER TABLE consumers 
            MODIFY services ENUM(
                'Brand Forge',
                'Brand Land',
                'Digital Compass',
                'Digital Stand',
                'Digital Architecture',
                'Public Presence',
                'OTT Advertising'
            ) NULL
        ");
    }

    public function down(): void
    {
        // Kembalikan ke definisi awal (jika rollback)
        DB::statement("
            ALTER TABLE consumers 
            MODIFY services ENUM(
                'Brand Forge',
                'Digital Compass',
                'Public Presence',
                'Digital Architecture'
            ) NULL
        ");
    }
};
