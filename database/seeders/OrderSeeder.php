<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'customer_name' => 'Иванов Иван Иванович',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
                'status' => 'new',
                'comment' => 'Пожалуйста, доставьте утром',
                'product_id' => 1,
                'quantity' => 2,
            ],
            [
                'customer_name' => 'Петрова Мария Сергеевна',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
                'status' => 'completed',
                'comment' => '',
                'product_id' => 2,
                'quantity' => 1,
            ],
            [
                'customer_name' => 'Сидоров Алексей Петрович',
                'created_at' => now(),
                'updated_at' => now(),
                'status' => 'new',
                'comment' => 'Связаться по телефону перед доставкой',
                'product_id' => 3,
                'quantity' => 5,
            ],
        ]);
    }
}
