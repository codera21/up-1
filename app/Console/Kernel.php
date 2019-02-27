<?php

namespace App\Console;

use Carbon\Carbon;
use function foo\func;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $users = DB::table('users')->get();
            foreach ($users as $list) {
                $today = date("y-m-d");
                $expire = $list->ban_date; //from database
                $today_time = strtotime($today);
                $expire_time = strtotime($expire);
                $minus = $expire_time - $today_time;
                if ($minus == 0 && $list->is_active == 'NO') {
                    DB::table('users')->where('id', $list->id)->update([
                        'ban' => 'YES',
                    ]);
                }
            }
        })->everyMinute();

        $schedule->call(function () {
            ///  block users who has not paid for subscription


        })->when(
            function () {
                return Carbon::now()->endOfMonth()->isToday();
            }
        );
        // check wheather to ban or not
        // set ban date and then make user inactive


//            ->when(
//            function () {
//                return Carbon::now()->endOfMonth()->isToday();
//            }
//        );
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
