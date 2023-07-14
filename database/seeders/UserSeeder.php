<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                // 'id' => 1,
                'dni' => '32547782N',
                'name' => 'Marta',
                'surname' => 'Marí Soro',
                'age' => 30,
                'cp' => 42361,
                'mobile' => 736554817,
                'email' => 'marta@gmail.com',
                'password' => bcrypt('Marta1234!'),
            ],
            [
                // 'id' => 2,
                'dni' => '20123665C',
                'name' => 'Maria Angeles',
                'surname' => 'Sanchis Oltra',
                'age' => 45,
                'cp' => 63218,
                'mobile' => 723615048,
                'email' => 'mangeles@gmail.com',
                'password' => bcrypt('MAngeles1234!'),
            ]
            ,
            [
                // 'id' => 3,
                'dni' => '20123665C',
                'name' => 'Jose Enrique',
                'surname' => 'Castells Montell',
                'age' => 50,
                'cp' => 74253,
                'mobile' => 617592301,
                'email' => 'jenrique@gmail.com',
                'password' => bcrypt('JEnrique1234!'),
            ],
            [
                // 'id' => 4,
                'dni' => '30187314N',
                'name' => 'Angela',
                'surname' => 'Maza Gilabert',
                'age' => 33,
                'cp' => 21035,
                'mobile' => 742536910,
                'email' => 'angela@gmail.com',
                'password' => bcrypt('Angela1234!'),
            ],
            [
                // 'id' => 5,
                'dni' => '36514287L',
                'name' => 'David',
                'surname' => 'Mateu Mahiques',
                'age' => 38,
                'cp' => 63021,
                'mobile' => 625471038,
                'email' => 'david@gmail.com',
                'password' => bcrypt('David1234!'),
            ],
            [
                // 'id' => 6,
                'dni' => '632145874P',
                'name' => 'Borja',
                'surname' => 'López Pérez',
                'age' => 30,
                'cp' => 12547,
                'mobile' => 639587421,
                'email' => 'borja@gmail.com',
                'password' => bcrypt('Borja1234!'),
            ],
            [
                // 'id' => 7,
                'dni' => '741236598A',
                'name' => 'Sarah',
                'surname' => 'Pérez Carrillo',
                'age' => 30,
                'cp' => 63251,
                'mobile' => 695321478,
                'email' => 'sarah@gmail.com',
                'password' => bcrypt('Sarah1234!'),
            ],
            [
                // 'id' => 8,
                'dni' => '54632987X',
                'name' => 'Mireia',
                'surname' => 'Alberola Camús',
                'age' => 25,
                'cp' => 41257,
                'mobile' => 741369582,
                'email' => 'mireia@gmail.com',
                'password' => bcrypt('Mireia1234!'),
            ],
            [
                // 'id' => 9,
                'dni' => '31654782S',
                'name' => 'Daniel',
                'surname' => 'Méndez Ripoll',
                'age' => 29,
                'cp' => 45632,
                'mobile' => 632554777,
                'email' => 'daniel@gmail.com',
                'password' => bcrypt('Daniel1234!'),
            ],
            [
                // 'id' => 10,
                'dni' => '33154782B',
                'name' => 'Carlos',
                'surname' => 'Almahano Muñóz',
                'age' => 33,
                'cp' => 31025,
                'mobile' => 712554789,
                'email' => 'carlos@gmail.com',
                'password' => bcrypt('Carlos1234!'),
            ],
            [
                // 'id' => 11,
                'dni' => '78556321N',
                'name' => 'Andrea',
                'surname' => 'Carbonell Aldabero',
                'age' => 34,
                'cp' => 43105,
                'mobile' => 691422057,
                'email' => 'andrea@gmail.com',
                'password' => bcrypt('Andrea1234!'),
            ],
            [
                'dni' => '361472995D',
                'name' => 'Emma',
                'surname' => 'Siles Oltra',
                'age' => 6,
                'cp' => 17302,
                'mobile' => 621433025,
                'email' => 'emma@gmail.com',
                'password' => bcrypt('Emma1234!'),
            ],
            [
                'dni' => '63225147A',
                'name' => 'Susi',
                'surname' => 'Jorpe Aslot',
                'age' => 42,
                'cp' => 63213,
                'mobile' => 632100214,
                'email' => 'susi@gmail.com',
                'password' => bcrypt('Susi1234!'),
            ],
            [
                'dni' => '214753666T',
                'name' => 'Jose',
                'surname' => 'Alpe Corre',
                'age' => 45,
                'cp' => 14753,
                'mobile' => 712365548,
                'email' => 'jose@gmail.com',
                'password' => bcrypt('Jose1234!'),
            ],
            [
                'dni' => '11536487Q',
                'name' => 'Carmen',
                'surname' => 'Ruíz Matilla',
                'age' => 5,
                'cp' => 32154,
                'mobile' => 712300564,
                'email' => 'carmen@gmail.com',
                'password' => bcrypt('Carmen1234!'),
            ],
            [
                'dni' => '38441523H',
                'name' => 'Maria',
                'surname' => 'Guillem Giner',
                'age' => 2,
                'cp' => 34872,
                'mobile' => 663214570,
                'email' => 'maria@gmail.com',
                'password' => bcrypt('Maria1234!'),
            ],
            [
                'dni' => '951032655P',
                'name' => 'Raul',
                'surname' => 'Barajas Martínez',
                'age' => 25,
                'cp' => 63214,
                'mobile' => 726930688,
                'email' => 'raul@gmail.com',
                'password' => bcrypt('Raul1234!'),
            ],
            [
                'dni' => '24551785S',
                'name' => 'Toni',
                'surname' => 'Cerdá Mollá',
                'age' => 25,
                'cp' => 12477,
                'mobile' => 722154365,
                'email' => 'toni@gmail.com',
                'password' => bcrypt('Toni1234!'),
            ],
            [
                'dni' => '631544745K',
                'name' => 'Marta',
                'surname' => 'Castells Girones',
                'age' => 30,
                'cp' => 42530,
                'mobile' => 623301547,
                'email' => 'marta1@gmail.com',
                'password' => bcrypt('Marta1234!'),
            ],
            [
                'dni' => '632114587E',
                'name' => 'David',
                'surname' => 'Estellés Sanchis',
                'age' => 72,
                'cp' => 74120,
                'mobile' => 709631548,
                'email' => 'david1@gmail.com',
                'password' => bcrypt('David1234!'),
            ],
            [
                'dni' => '74521102U',
                'name' => 'Andrea',
                'surname' => 'Argente Vidal',
                'age' => 73,
                'cp' => 70215,
                'mobile' => 702366541,
                'email' => 'andrea1@gmail.com',
                'password' => bcrypt('Andrea1234!'),
            ],
            [
                'dni' => '95633214N',
                'name' => 'Aitana',
                'surname' => 'Fons Mayor',
                'age' => 1,
                'cp' => 63221,
                'mobile' => 795632002,
                'email' => 'aitana@gmail.com',
                'password' => bcrypt('Aitana1234!'),
            ],
            [
                'dni' => '32145541J',
                'name' => 'Rafa',
                'surname' => 'Aparicio Mahiques',
                'age' => 30,
                'cp' => 95233,
                'mobile' => 721145032,
                'email' => 'rafa@gmail.com',
                'password' => bcrypt('Rafa1234!'),
            ]
        ]);
    }
}
