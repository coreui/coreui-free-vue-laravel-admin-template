<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // Register a new user
        $user = Sentinel::register([
            "first_name" => $faker->firstName(),
            "last_name" => $faker->lastName(),
            "email" => "admin@example.com",
            "password" => "password",
            "permissions" => [],
        ]);

        $activation = Activation::create($user);
        $activated = Activation::complete($user, $activation->code);

        $role = Sentinel::getRoleRepository()->findBySlug('administrator'); # get administrator role
        $role->users()->attach($user); # attach admin user to administrator role

        $role = Sentinel::getRoleRepository()->findBySlug('moderator'); # get moderator role
        for($i = 0; $i < 5; $i++) {
            $user = Sentinel::register([
                "first_name" => $faker->firstName(),
                "last_name" => $faker->lastName(),
                "email" => $faker->email(),
                "password" => "password",
                "permissions" => [],
            ]);
            Activation::create($user);
            $role->users()->attach($user); # attach user to moderator role
        }

        $role = Sentinel::getRoleRepository()->findBySlug('normal'); # get normal role
        for($i = 0; $i < 10; $i++) {
            $user = Sentinel::register([
                "first_name" => $faker->firstName(),
                "last_name" => $faker->lastName(),
                "email" => $faker->email(),
                "password" => "password",
                "permissions" => [],
            ]);
            Activation::create($user);
            $role->users()->attach($user); # attach user to normal role
        }
    }
}
