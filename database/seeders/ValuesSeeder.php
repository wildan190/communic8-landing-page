<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Seeder;

class ValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::updateOrCreate([
            'key' => 'years_experience',
        ], [
            'title' => 'Years of Experience',
            'value' => (now()->year - 2005) . '+',
            'icon' => 'fas fa-briefcase',
        ]);

        Value::updateOrCreate([
            'key' => 'brands_handled',
        ], [
            'title' => 'Brands Handled',
            'value' => '500+',
            'icon' => 'fas fa-layer-group',
        ]);

        Value::updateOrCreate([
            'key' => 'clients_return',
        ], [
            'title' => 'Clients Return',
            'value' => '8/10',
            'icon' => 'fas fa-handshake',
        ]);
    }
}
