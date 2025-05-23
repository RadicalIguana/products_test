<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Упаковка бумаги',
                'description' => 'Бумага формата А4, 500 листов',
                'price' => 350,
                'category_id' => 1, // лёгкий
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Керамическая ваза',
                'description' => 'Хрупкий декоративный предмет',
                'price' => 1200,
                'category_id' => 2, // хрупкий
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Металлический ящик',
                'description' => 'Прочный и тяжёлый ящик для инструментов',
                'price' => 2500,
                'category_id' => 3, // тяжёлый
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
