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
            DB::table('product')->insert([
                'product_name' => $faker->name,
                'product_price' => $faker->numberBetween(1000,900000),
                'product_category' => $faker->numberBetween(1,100)
            ]);
        }
    }
}
