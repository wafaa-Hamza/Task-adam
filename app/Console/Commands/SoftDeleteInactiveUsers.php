<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SoftDeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:soft-delete-inactive-users';

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
        $users_deactived = User::where('status', 'inactive')->get();
        $count = $users_deactived->count();

        foreach ($users_deactived as $user) {
            $user->delete();
        }

        $this->info($count . ' users have been soft deleted.');

        //php artisan app:soft-delete-inactive-users;   for checking in terminal

    }
  }

