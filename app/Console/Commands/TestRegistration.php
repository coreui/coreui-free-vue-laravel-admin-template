<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Users;

class TestRegistration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:registration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Registration Feature';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = new Users;
        $user->name ="Mark";
        $user->email = "mark@xplorit.com";
        $user->password = "m4rkh3r4m15";
        $user->menuroles = 'user,admin';
        $user->status = 'active';

        $user->save();
        dd($user);
    }
}
