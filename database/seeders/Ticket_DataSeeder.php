<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ticket_DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets_data')->insert([
            [
                'name' => 'Eduardo',
                'surname' => 'Gutierrez Pérez',
                'age' => 39,
                'ticket' => 2
            ],
            [
                'name' => 'Gonzalo',
                'surname' => 'Torres Mata',
                'age' => 30,
                'ticket' => 4
            ]
        ]);
    }
}
