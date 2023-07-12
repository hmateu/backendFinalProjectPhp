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
                'email' => 'mangelesTP@gmail.com',
                'password' => 'MAngeles1234!',
                'user' => 2,
                'attraction' => 1
            ],
            [
                'email' => 'jenrique@gmail.com',
                'password' => 'JEnrique1234!',
                'user' => 3,
                'attraction' => 1
            ],
            [
                'email' => 'angelaTP@gmail.com',
                'password' => 'Angela1234!',
                'user' => 4,
                'attraction' => 2
            ],
            [
                'email' => 'david@gmail.com',
                'password' => 'David1234!',
                'user' => 5,
                'attraction' => 2
            ],
            [
                'email' => 'borjaTP@gmail.com',
                'password' => 'Borja1234!',
                'user' => 6,
                'attraction' => 3
            ],
            [
                'email' => 'sarahTP@gmail.com',
                'password' => 'Sarah1234!',
                'user' => 7,
                'attraction' => 3
            ],
            [
                'email' => 'mireiaTP@gmail.com',
                'password' => 'Mireia1234!',
                'user' => 8,
                'attraction' => 4
            ],
            [
                'email' => 'danielTP@gmail.com',
                'password' => 'Daniel1234!',
                'user' => 9,
                'attraction' => 4
            ],
            [
                'email' => 'carlosTP@gmail.com',
                'password' => 'Andrea1234!',
                'user' => 10,
                'attraction' => 5
            ],
            [
                'email' => 'andreaTP@gmail.com',
                'password' => 'Andrea1234!',
                'user' => 11,
                'attraction' => 5
            ]
        ]);
    }
}
