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
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 3,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 4,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 5,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 12,
                'ticket_type' => 2,
                'price' => 25,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 13,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 14,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 15,
                'ticket_type' => 2,
                'price' => 25,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 16,
                'ticket_type' => 2,
                'price' => 25,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 17,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 18,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 19,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 20,
                'ticket_type' => 3,
                'price' => 20,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 21,
                'ticket_type' => 3,
                'price' => 20,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 22,
                'ticket_type' => 2,
                'price' => 25,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 23,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ],
            [
                'date' => '2023-07-11 00:00:00',
                'customer' => 23,
                'ticket_type' => 1,
                'price' => 35,
                'validated' => false
            ]
        ]);
    }
}
