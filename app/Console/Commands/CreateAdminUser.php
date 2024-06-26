<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::create([
            'fname' => 'Admin',
            'lname' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('sport11'),
            'role' => '1', // Assuming 1 is the role for admin
            'status' => '1', // Assuming 1 means the user is approved
            'behavior' => '1', // Assuming 1 means the user is not blocked
        ]);

        $this->info('Admin user created successfully.');

        return 0;
    }
}
