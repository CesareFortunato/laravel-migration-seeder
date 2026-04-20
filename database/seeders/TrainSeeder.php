<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;

class TrainSeeder extends Seeder
{
    public function run(Faker $faker): void
    {


        for ($i = 0; $i < 20; $i++) {

            $newTrain = new Train();

            $newTrain->azienda = $faker->company;
            $newTrain->stazione_partenza = $faker->city;
            $newTrain->stazione_arrivo = $faker->city;
            $newTrain->orario_partenza = $faker->time;
            $newTrain->orario_arrivo = $faker->time;
            $newTrain->codice_treno = $faker->bothify('??-####');
            $newTrain->totale_carrozze = $faker->numberBetween(5, 12);
            $newTrain->in_orario = $faker->boolean;
            $newTrain->cancellato = $faker->boolean;
            $newTrain->binario = $faker->randomElement([
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
            ])
            ;
            $newTrain->save();
        }
    }
}

