<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
        $this->table('user')->truncate();

        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'email'         => $faker->email,
                'password'      => password_hash('test123#', PASSWORD_BCRYPT, ['cost' => 12]),
                'last_name'     => $faker->lastName,
                'first_name'    => $faker->firstName,
                'img'           => null,
                'user_rating'    => $faker->numberBetween(0,5),
                'language'      => $faker->languageCode
            ];
        }

        $this->insert('user', $data);
    }
}
