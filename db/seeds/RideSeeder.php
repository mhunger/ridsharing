<?php


use Phinx\Seed\AbstractSeed;

class RideSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'type' => $faker->randomElement(['Privatfahrt', 'Mietwagen']),
                'from' => $faker->city,
                'to' => $faker->city,
                'id_user_offered_by' => $faker->numberBetween(1,100),
                'travel_day' => $faker->iso8601,
                'arrival_time' => $faker->iso8601,
                'seats' => $faker->numberBetween(3,5),
                'price' => $faker->randomFloat(2, 0, 300),
                'departure_location' => $faker->address,
                'description' => $faker->realText(),
                'pet' => $faker->boolean(),
                'twoseats' => $faker->boolean(),
                'woman' => $faker->boolean(),
                'smoker' => $faker->boolean(),
                'baggage_size' => $faker->boolean(),
                'detour' => $faker->boolean(),
                'return' => $faker->boolean(),
                'free_seating' => $faker->boolean()
            ];
        }

        $this->insert('ride', $data);
    }
}
