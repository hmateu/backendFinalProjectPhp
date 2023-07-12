<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role_User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_user')->insert([
            [
                'role' => 1,
                'user' => 1
            ],
            [
                'role' => 2,
                'user' => 2
            ],
            [
                'role' => 2,
                'user' => 3
            ],
            [
                'role' => 2,
                'user' => 4
            ],
            [
                'role' => 2,
                'user' => 5
            ],
            [
                'role' => 2,
                'user' => 6
            ],
            [
                'role' => 2,
                'user' => 7
            ],
            [
                'role' => 2,
                'user' => 8
            ],
            [
                'role' => 2,
                'user' => 9
            ],
            [
                'role' => 2,
                'user' => 10
            ],
            [
                'role' => 2,
                'user' => 11
            ],
            [
                'role' => 3,
                'user' => 2
            ],
            [
                'role' => 3,
                'user' => 3
            ],
            [
                'role' => 3,
                'user' => 4
            ],
            [
                'role' => 3,
                'user' => 5
            ],
            [
                'role' => 3,
                'user' => 12
            ],
            [
                'role' => 3,
                'user' => 13
            ],
            [
                'role' => 3,
                'user' => 14
            ],
            [
                'role' => 3,
                'user' => 15
            ],
            [
                'role' => 3,
                'user' => 16
            ],
            [
                'role' => 3,
                'user' => 17
            ],
            [
                'role' => 3,
                'user' => 18
            ],
            [
                'role' => 3,
                'user' => 19
            ],
            [
                'role' => 3,
                'user' => 20
            ],
            [
                'role' => 3,
                'user' => 21
            ],
            [
                'role' => 3,
                'user' => 22
            ]
        ]);
    }
}
