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
                'description' => 'Esta es la descripción de la atracción Monte Krustmore, donde los clientes podrán aprender un poco más acerda de esta atracción.',
                'min_height' => 150,
                'max_height' => 190,
                'length' => 2100
            ],
            [
                'name' => 'Bloque encantado',
                'description' => 'Bloque encantado es una atracción donde los clientes podrán aprender un poco más acerda de esta fantasía.',
                'min_height' => 140,
                'max_height' => 185,
                'length' => 550
            ],
            [
                'name' => 'La Aguja de comida',
                'description' => 'Con La Aguja de comida, los más peques aprenderán el valor de una dieta sana.',
                'min_height' => 120,
                'max_height' => 210,
                'length' => 750
            ],
            [
                'name' => 'Galeon vikingo',
                'description' => 'El Galeon vikingo es la atracción más demandada por nuestros visitantes. Consiste en una historia que te adentra en las profundidades de los galeones vikingos.',
                'min_height' => 145,
                'max_height' => 195,
                'length' => 1200
            ],
            [
                'name' => 'Castillo de Itchy durmiente',
                'description' => 'Castillo de Itchy durmiente es un repaso a todos los castillos encantados que han formado parte de nuestra infancia, te lo pasarán en grande.',
                'min_height' => 140,
                'max_height' => 195,
                'length' => 1000
            ]
        ]);
    }
}
