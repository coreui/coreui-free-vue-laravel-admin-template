<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => [
                "user.create" => true,
                "user.delete" => true,
                "user.view" => true,
                "user.update" => true
            ]
        ]);


        $role = Sentinel::getRoleRepository()->createModel()->create([
            "name" => "Moderator",
            "slug" => "moderator",
            "permissions" => [
                "user.create" => false,
                "user.delete" => false,
                "user.view" => true,
                "user.update" => true,
            ]
        ]);

        $role = Sentinel::getRoleRepository()->createModel()->create([
            "name" => "Normal",
            "slug" => "normal",
            "permissions" => [
                "user.create" => false,
                "user.delete" => false,
                "user.view" => true,
                "user.update" => true,
            ]
        ]);
    }
}
