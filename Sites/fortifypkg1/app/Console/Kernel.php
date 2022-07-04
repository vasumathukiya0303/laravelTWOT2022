<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('users:send_doc_link')->daily()->at('08:00');

        //Every One minutes call below command

//        $schedule->call(function () {
//            info('called every minutes');
//        })->everyMinute();

        //Scheduling Artisan Commands
//        $schedule->command('users:process')->everyMinute();

        //Scheduling Artisan Commands Run in Background
        $schedule->command('users:process')->everyMinute()->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
