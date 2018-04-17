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

        $this->table('ride_stop')->truncate();
        $this->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->table('ride')->truncate();
        $this->query('SET FOREIGN_KEY_CHECKS = 1');

        $this->insert('ride', $this->createRides());
        $this->insert('ride_stop', $this->createRideStops());
    }


    /**
     * @return array
     */
    private function createRideStops(): array
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'stop_name'     => $faker->streetAddress,
                'id_ride'       => $faker->numberBetween(1,100)
            ];
        }
        return $data;
    }

    /**
     * @return array
     */
    private function createRides(): array
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'type' => $faker->randomElement(['PRIVATFAHRT', 'MIETWAGEN']),
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
                'free_seating' => $faker->boolean(),
                'agb_agreed' => $faker->boolean(),
                'data_privacy_agreed' => $faker->boolean(),
                'passenger_seat_reserved' => $faker->boolean(),
                'immediate_booking' => $faker->boolean(),
                'payment' => $faker->randomElement(['ONLINE', 'BAR']),
                'back_seat_left_reserved' => $faker->boolean(),
                'back_seat_right_reserved' => $faker->boolean(),
                'back_seat_middle_reserved' => $faker->boolean(),
                'third_row_left_reserved' => $faker->boolean(),
                'third_row_right_reserved' => $faker->boolean(),
                'third_row_middle_reserved' => $faker->boolean()
            ];
        }
        return $data;
    }
}
