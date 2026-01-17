<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use DB;

class companySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $domains = ["Organisation", "Agriculture", "Industry", "Trading"];

        // foreach (range(1, 50) as $index) {
        //     DB::table('companies')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'region' => $faker->numberBetween(1, 3), // Random region (1, 2, or 3)
        //         'city' => $faker->city,
        //         'phone' => $faker->phoneNumber,
        //         'domain' => $faker->randomElement($domains), // Random domain from the array
        //     ]);
        // }

            // testing using real email
         foreach (range(1, 3) as $index) {
            DB::table('companies')->insert([
                'name' => $faker->name,
                'email' => "yasserreed0@gmail.com",
                'region' => $faker->numberBetween(1, 3), // Random region (1, 2, or 3)
                'city' => $faker->city,
                'phone' => $faker->phoneNumber,
                'domain' => $faker->randomElement($domains), // Random domain from the array
            ]);
        }
    }
}
