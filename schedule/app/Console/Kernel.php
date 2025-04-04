<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $now = now();
        $assignments = Assignment::whereBetween('deadline', [$now->copy()->addDay(), $now->copy()->addHour()])->get();

        foreach ($assignments as $assignment) {
            $assignment->user->notify(new DeadlineReminder($assignment));
        }
    })->everyMinute();
}


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
