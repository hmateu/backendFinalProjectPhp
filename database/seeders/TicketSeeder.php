<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 2,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 3,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 4,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 5,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 12,
                'price_change' => 2,
                'price' => 25,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 13,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 14,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 15,
                'price_change' => 2,
                'price' => 25,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 16,
                'price_change' => 2,
                'price' => 25,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 17,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 18,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 19,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 20,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 21,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 22,
                'price_change' => 2,
                'price' => 25,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 23,
                'price_change' => 1,
                'price' => 35,
                'validated' => false
            ]
        ]);
    }
}
