<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;

class TrainSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $ritardo = $faker->numberBetween(0, 60);

        for ($i = 0; $i < 20; $i++) {
            Train::create([
                'azienda' => $faker->randomElement(['Trenitalia', 'Italo']),

                'stazione_partenza' => $faker->city(),
                'stazione_arrivo' => $faker->city(),

                'orario_partenza' => $faker->dateTimeBetween('-1 day', '+2 days'),
                'orario_arrivo' => $faker->dateTimeBetween('+1 hour', '+3 days'),

                'codice_treno' => strtoupper($faker->bothify('??####')),

                'totale_carrozze' => $faker->numberBetween(5, 12),

                'in_orario' => $ritardo === 0,

                'cancellato' => $faker->boolean(10),

                'ritardo' => $ritardo,

                'binario' => $faker->randomElement([
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '3Est',
                    '4Ovest'
                ]),
            ]);
        }
    }
}

