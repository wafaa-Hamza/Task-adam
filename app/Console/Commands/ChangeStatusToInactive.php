<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ChangeStatusToInactive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:change-status-to-inactive';

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
        $usersInActive = User::where('email', 'like', '%test%')->update(['status' => 'inactive']);
        $this->info($usersInActive . ' users have been deactivated.');   //display the message in the console with integer data

        //php artisan users:soft-delete-inactive-users;   for checking in terminal


    }
}
