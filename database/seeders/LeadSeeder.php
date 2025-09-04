<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use Faker\Factory as Faker;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10000; $i++) {
            Lead::create([
                'name'      => $faker->name,
                'email'     => $faker->unique()->safeEmail,
                'gclid'     => $faker->uuid,
                'sub_id'    => $faker->randomElement(['sub1','sub2','sub3']),
                'created_at'=> $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
