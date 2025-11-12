<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah definisi ENUM dengan semua nilai baru
        DB::statement("
            ALTER TABLE consumers 
            MODIFY industry ENUM(
                'Technology',
                'Finance',
                'Healthcare',
                'Education',
                'Retail',
                'Manufacturing',
                'Media & Entertainment',
                'Hospitality',
                'Government',
                'Other',
                'Telekomunikasi',
                'FnB',
                'Oil & Gas',
                'Transportation',
                'Hotel',
                'Otomotif',
                'Media',
                'Elektronik',
                'Banking',
                'Insurance',
                'Manufacture',
                'Entertaiment & Leisure',
                'Plantation',
                'Education & learning',
                'Travel or Accomodation',
                'Services',
                'Community & Public Services',
                'Real Estate',
                'Gaming',
                'Pharmaceutical',
                'Fashion',
                'Cosmetics'
            ) NULL
        ");
    }

    public function down(): void
    {
        // Kembalikan ke definisi awal (optional)
        DB::statement("
            ALTER TABLE consumers 
            MODIFY industry ENUM(
                'Technology',
                'Finance',
                'Healthcare',
                'Education',
                'Retail',
                'Manufacturing',
                'Media & Entertainment',
                'Hospitality',
                'Government',
                'Other'
            ) NULL
        ");
    }
};
