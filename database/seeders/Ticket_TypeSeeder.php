<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ticket_TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ticket_type')->insert([
            [
                'id' => 1,
                'name' => 'General',
                'price' => 35,
                'description' => 'Entrada para personas entre 12 y 65 años, ambos inclusive'
            ],
            [
                'id' => 2,
                'name' => 'Junior',
                'price' => 25,
                'description' => 'Entrada para personas menores de 12 años'
            ],
            [
                'id' => 3,
                'name' => 'Reducida',
                'price' => 20,
                'description' => 'Senior: Entrada para personas mayores de 65 años. Personas con discapacidad (igual o +33%) con un acompañante gratis. Familia Numerosa (precio por persona)'
            ]
        ]);
    }
}
