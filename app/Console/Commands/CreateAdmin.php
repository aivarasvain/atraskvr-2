<?php

namespace App\Console\Commands;
use App\Models\VRUsers;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;
class CreateAdministrator extends Command
{
    protected $signature = "make:admin";
    protected $description = "Create admin account";
    public function handle()
    {
        $this->comment("Creating admin user");
        $record = VRUsers::create([
            'id' => Uuid::uuid4(),
            'full_name' => $name = $this->ask('Please enter name'),
            'email' => $email = $this->ask('Please enter email'),
            'phone' => 86868686,
            'password' => bcrypt($password = $this->secret('Please enter password')),
        ]);
        $record -> connection()-> sync('super-admin');
        $this->comment("Great success!");
    }
}