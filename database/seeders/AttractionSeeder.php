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
                'picture' => 'https://s3-pictures-final-proyect-fsd.s3.amazonaws.com/caida_libre.jpg',
                'name' => 'Caída libre',
                'description' => 'Esta atracción cuenta con una gran torre de la que te dejarán caer un total de 100 metros de caída libre. Experimentarás una gran subida de adrenalina que te costará olvidar.',
                'min_height' => 140,
                'max_height' => 195,
                'length' => 100
            ],
            [
                'picture' => 'https://s3-pictures-final-proyect-fsd.s3.amazonaws.com/barca_va.jpg',
                'name' => '¡Barca va!',
                'description' => 'Disfrutarás de un agradable paseo en barca, hasta que llegue el momento de precipitarse 20 metros abajo a gran velocidad. La diversión está garantizada.',
                'min_height' => 120,
                'max_height' => 220,
                'length' => 550
            ],
            [
                'picture' => 'https://s3-pictures-final-proyect-fsd.s3.amazonaws.com/decagono.jpg',
                'name' => 'Decágono',
                'description' => '¿Te gusta dar vueltas? Esta sin duda, es tu mejor elección. Darás vueltas al mismo tiempo que te balancearás de un lado a otro para sacar todo el estrés que lleves dentro.',
                'min_height' => 140,
                'max_height' => 195,
                'length' => 200
            ],
            [
                'picture' => 'https://s3-pictures-final-proyect-fsd.s3.amazonaws.com/spa.jpg',
                'name' => 'Spa',
                'description' => 'Tenemos una zona dedicada al descanso. Con 450 metros en piscinas y jaccuzzis, puedes relajarte y dejarlo todo atrás. Al mismo tiempo que pasar un rato divertido con los más peques.',
                'min_height' => 100,
                'max_height' => 220,
                'length' => 450
            ],
            [
                'picture' => 'https://s3-pictures-final-proyect-fsd.s3.amazonaws.com/pasajeros_al_tren.jpg',
                'name' => '¡Pasajeros al tren!',
                'description' => 'Súbete a nuestro tren para conocer nuestro parque al completo. Disfrutarás de un paseo donde podrás apreciar todo el parque y organizar mejor tu día. Es ideal para conocernos un poco mejor y aprovechar el día al máximo.',
                'min_height' => 60,
                'max_height' => 195,
                'length' => 3000
            ],
            [
                'picture' => 'https://s3-pictures-final-proyect-fsd.s3.amazonaws.com/embestidas.jpg',
                'name' => 'Embestidas',
                'description' => 'Esta imitación a los coches de choque fascina a los más peques de la casa. Disfrutarán de una agradable sensación mientras demuestran sus habilidades al volante de un jabalí o una cabra.',
                'min_height' => 120,
                'max_height' => 195,
                'length' => 30
            ],
            [
                'picture' => 'https://s3-pictures-final-proyect-fsd.s3.amazonaws.com/loop_and_loop.jpg',
                'name' => 'Loop and loop',
                'description' => '¿Estás preparado para una inyección de adrenalina? Con 8 loopings, esta es la atracción que más disfrutan los más aventureros. No puedes dejar pasar la oportunidad de experimentar su efecto.',
                'min_height' => 140,
                'max_height' => 195,
                'length' => 2000
            ],
            [
                'picture' => 'https://s3-pictures-final-proyect-fsd.s3.amazonaws.com/vuela_libre.jpg',
                'name' => 'Vuela libre',
                'description' => 'Súbete a un columpio mientras das vueltas y aprecias nuestro parque. Esta, sin duda, es la atracción más relajante, sin contar nuestro spa. Te recomendamos subirte para que disfrutes de un vuelo con buenas vistas',
                'min_height' => 120,
                'max_height' => 195,
                'length' => 200
            ]
        ]);
    }
}
