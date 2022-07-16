<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule) {
		$schedule->call(function () {
			$controller = new \App\Http\Controllers\HrcWalletTransactionController();
			$controller->updateTronBalance();
		})->cron('*/1 * * * *');

		$schedule->call(function () {
			$controller = new \App\Http\Controllers\HrcWalletTransactionController();
			$controller->hrcTokenDeposit();
		})->everyFiveMinutes();
	}

	/**
	 * Register the commands for the application.
	 *
	 * @return void
	 */
	protected function commands() {
		$this->load(__DIR__ . '/Commands');

		require base_path('routes/console.php');
	}
}
