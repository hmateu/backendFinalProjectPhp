<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attractions')->insert([
            [
                'name' => 'Monte Krustmore',
                'min_height' => 150,
                'max_height' => 190,
                'length' => 2100
            ],
            [
                'name' => 'Bloque encantado',
                'min_height' => 140,
                'max_height' => 185,
                'length' => 550
            ],
            [
                'name' => 'La Aguja de comida',
                'min_height' => 120,
                'max_height' => 210,
                'length' => 750
            ],
            [
                'name' => 'Galeon vikingo',
                'min_height' => 145,
                'max_height' => 195,
                'length' => 1200
            ],
            [
                'name' => 'Castillo de Itchy durmiente',
                'min_height' => 140,
                'max_height' => 195,
                'length' => 1000
            ]
        ]);
    }
}
