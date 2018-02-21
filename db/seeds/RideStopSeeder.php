<?php


use Phinx\Seed\AbstractSeed;

class RideStopSeeder extends AbstractSeed
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
                'stop_name'     => $faker->streetAddress,
                'id_ride'       => $faker->numberBetween(1,100)
            ];
        }

        $this->insert('ride_stop', $data);
    }
}
