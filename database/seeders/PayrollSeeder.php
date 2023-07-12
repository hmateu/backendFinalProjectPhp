<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payrolls')->insert([
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 2000,
                'employee' => 1
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 2000,
                'employee' => 2
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 1700,
                'employee' => 3
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 1700,
                'employee' => 4
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 1500,
                'employee' => 5
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 1500,
                'employee' => 6
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 1500,
                'employee' => 7
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 1500,
                'employee' => 8
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 1500,
                'employee' => 9
            ],
            [
                'date' => '2023-07-01 00:00:00',
                'salary' => 1500,
                'employee' => 10
            ]
        ]);
    }
}
