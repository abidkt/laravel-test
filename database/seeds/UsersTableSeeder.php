<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        for($i = 1; $i < 10; $i++){

            $username = 'user_' . $i;
            // Seed test user
            $user = User::where('email', '=', $username . '@user.com')->orWhere('username', '=', $username )->first();
            if ($user === null) {
                $user = User::create([
                    'username'                       => $username,
                    'first_name'                     => $faker->firstName,
                    'last_name'                      => $faker->lastName,
                    'email'                          => $username . '@user.com',
                    'password'                       => Hash::make('password'),
                    'city'                           => $faker->city,
                ]);

                $user->save();
            }
        }

    }
}
