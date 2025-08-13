<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;
use Faker\Factory as Faker;

class GuruSeeder extends Seeder
{


    public function run(): void
    {

        Guru::factory(25)->create();

        // $faker = Faker::create('id_MY');

        //  for ($i = 0; $i < 25; $i++) {
        //     Guru::create([
        //       'nama_guru' => $faker->name(),
        //         'alamat' => $faker->address(),
        //         'no_telefon' => $faker->randomNumber(9),
        //        'id_guru' => $faker->randomNumber(4),
        //     ]);
        //    }
    }
}
