<?php

// php artisan make:command SendTrafficEmailReport

namespace App\Console\Commands;

use App\Mail\SendReport;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;

class SendTrafficEmailReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendreport:name';

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

        // place to do the magic

        $count = 150;

        Mail::to('patryk.r.nowak@gmail.com')->send(new SendReport($count));

        // return Command::SUCCESS;
    }
}
