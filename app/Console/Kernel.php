<?php

namespace App\Console;

use Illuminate\Support\Facades\Log;
use App\Console\Commands\CoinTweets;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\CoinTweets::class,
        \App\Console\Commands\SampleCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:coinTweets')
            ->hourly()
            ->onSuccess(function () {
                Log::debug('定期処理:coinTweets:成功');
            })
            ->onFailure(function () {
                Log::error('定期処理:coinTweets:失敗');
            });;

        $schedule->command('command:sample')
            ->hourlyAt(10);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
