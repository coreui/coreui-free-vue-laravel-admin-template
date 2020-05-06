<?php

use Illuminate\Database\Seeder;
//use database\seeds\NotesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('RolesSeeder');
        $this->call("UserSeeder");
        $this->call('MenuSeeders');
    }
}
