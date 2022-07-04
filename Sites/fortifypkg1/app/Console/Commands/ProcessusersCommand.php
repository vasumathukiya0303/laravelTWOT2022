<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ProcessusersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:process';

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
        $this->info('The command was successful!');
        $this->newLine();
//        $this->error('Something went wrong!');
//        $this->newLine(2);
        $this->line('Display this on the screen');
        $this->table(
            ['Name', 'Email','Email_verified_at','Password','Remember_token','Created_at','Updated_at'],
            User::all(['id','name', 'email','email_verified_at','password','remember_token','created_at','updated_at'])->toArray()
        );

        $this->withProgressBar(User::all(), function () {
            sleep(1);
        });
        $this->newLine();
        return Command::SUCCESS;
    }
}
