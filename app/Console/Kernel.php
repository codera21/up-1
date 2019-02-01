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
            $paymentThisMonth = DB::table('payments_details')
                ->where('subscription_fee', 'YES')
                ->whereMonth('end_date', Carbon::now()->month)
                ->get();
            $userIDs = array();
            foreach ($paymentThisMonth as $payment) {
                array_push($userIDs, $payment->user_id);
            }
            // userIds has userIds of people who paid so those who did not payed
            array_push($userIDs, 1);
            $otherUsers = DB::table('users')
                ->whereNotIn('id', $userIDs)
                ->get();
            foreach ($otherUsers as $user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['is_active' => 'NO']);
            }
            DB::table('users')->where('is_active', 'YES')->update([
                'ban_date' => Carbon::now()->addMonths(2)
            ]);
            /// give commission according to active users
            $levels = array();
            $users = DB::table('users')
                ->where('id', '!=', 1)// admin
                ->where('is_active', 'YES')
                ->get()
                ->toArray();
            foreach ($users as $user) {
                // todo: optimize this algorithm
                // for level 1
                $count = 0;
                $levels['level_1'] = array();
                foreach ($users as $item) {
                    if ($item->parent_id == $user->id) {
                        array_push($levels['level_1'], $item);
                        $count++;
                    }
                }
                // for level 2
                $count2 = 0;
                $levels['level_2'] = array();
                foreach ($levels['level_1'] as $level1) {
                    foreach ($users as $item) {
                        if ($item->parent_id == $level1->id) {
                            array_push($levels['level_2'], $item);
                            $count2++;
                        }
                    }
                }
                // for level 3
                $count3 = 0;
                $levels['level_3'] = array();
                foreach ($levels['level_2'] as $level2) {
                    foreach ($users as $item) {
                        if ($item->parent_id == $level2->id) {
                            array_push($levels['level_3'], $item);
                            $count3++;
                        }
                    }
                }
                // for level 4
                $count4 = 0;
                $levels['level_4'] = array();
                foreach ($levels['level_3'] as $level3) {
                    foreach ($users as $item) {
                        if ($item->parent_id == $level3->id)
                            $count4++;
                    }
                }
                $totalCommission = (($count * 5) + ($count2 * 5) + ($count3 * 5) + ($count4 * 5));

                if ($totalCommission != 0) {
                    // commence insertion into  user_commission
                    // get opening balance
                    $commissions = DB::table('user_commissions')->where('receiver_id', $user->id)->get();

                    $openingBalance = (float)0.00;
                    foreach ($commissions as $commission) {
                        $openingBalance += $commission->payment;
                    }
                    DB::table('user_commissions')->insert(
                        [
                            'receiver_id' => $user->id,
                            'payer_id' => 1, // 1 is admin
                            'payment' => $totalCommission,
                            'transaction_type' => 'COMMISSION_FROM_ADMIN',
                            'commission_amount' => $totalCommission,
                            'opening_balance' => $openingBalance,
                            'closing_balance' => $openingBalance + $totalCommission,
                            'created_at' => Carbon::now()->toDateTimeString()
                        ]
                    );
                }
            }

        })->everyMinute();
            /*->when(
            function () {
                return Carbon::now()->endOfMonth()->isToday();
            }
        );*/
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
