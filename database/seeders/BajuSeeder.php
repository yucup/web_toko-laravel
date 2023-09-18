<?php

namespace Database\Seeders;

use App\Models\Baju;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BajuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 8 ; $i++) { 
            Baju::create([
                'merek_baju' => $faker->firstName,
                'ukuran_baju' => $faker->firstName,
                'harga_baju' => $faker->randomNumber,
                'foto_baju' => $faker->firstName
                
            ]);
        }
    }
}
