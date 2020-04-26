<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 100 ; $i++) { 
            DB::table('products')->insert([
                'name' => $faker->name,
                'price' => $faker->numberBetween(1000,900000),
                'category_id' => $faker->numberBetween(1,100)
            ]);
        }
    }
}
