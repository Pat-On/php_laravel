<?php

//php artisan make:command DeleteInactiveUsers --command=inactive:users

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inactive:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \DB::table('users')->where('email_verified_at', '=', null)->delete();

        return Command::SUCCESS;
    }
}
