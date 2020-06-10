<?php

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 30; $i++) {
            Produit::create([
                'nom' => $faker->sentence(4),
                'remise' => $faker->buildingNumber,
                'isPromo' => $faker->buildingNumber,
                'date_debut' => $faker->dateTime($max = 'now', $timezone = null),
                'date_fin' => $faker->dateTime($max = 'now', $timezone = null),
                'category_id' =>2,
                'prix' => $faker->numberBetween(15, 300) * 100,
                'imgPath' => 'https://via.placeholder.com/200x250'
            ]);
        }
    }
}
