<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'user' => 2,
                'attraction' => 1
            ],
            [
                'user' => 3,
                'attraction' => 1
            ],
            [
                'user' => 4,
                'attraction' => 2
            ],
            [
                'user' => 5,
                'attraction' => 2
            ],
            [
                'user' => 6,
                'attraction' => 3
            ],
            [
                'user' => 7,
                'attraction' => 3
            ],
            [
                'user' => 8,
                'attraction' => 4
            ],
            [
                'user' => 9,
                'attraction' => 4
            ],
            [
                'user' => 10,
                'attraction' => 5
            ],
            [
                'user' => 11,
                'attraction' => 5
            ],
            [
                'user' => 13,
                'attraction' => 6
            ],
            [
                'user' => 14,
                'attraction' => 6
            ],
            [
                'user' => 17,
                'attraction' => 7
            ],
            [
                'user' => 18,
                'attraction' => 7
            ],
            [
                'user' => 19,
                'attraction' => 8
            ],
            [
                'user' => 20,
                'attraction' => 8
            ]
        ]);
    }
}
