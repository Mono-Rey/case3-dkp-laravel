<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::create([
            'name' => 'Laptop ASUS Vivobook',
            'description' => 'Perangkat pengembang sistem',
            'stock' => 10,
        ]);

        Item::create([
            'name' => 'Microphone Interview',
            'description' => 'Peralatan input suara',
            'stock' => 5,
        ]);
    }
}