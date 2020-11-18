<?php

namespace App\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedules = DB::table('list_schedule')->get();
        foreach ($schedules as $item) {
        $frequency = $item->schedule;
        // Use the scheduler to add the task at its desired frequency
        // $schedule->call(function() use($item) {
        //     DB::table('status')->insert([
        //     'status' => 'ok',
        //     'id_schedule' => $item->id_schedule
        //     ]);
        // })->cron($item->schedule);

        $schedule->exec('echo test')->cron($item->schedule);
    }
        // $schedule->command('inspire')->hourly();
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
