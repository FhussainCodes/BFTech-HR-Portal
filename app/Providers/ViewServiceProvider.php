<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Attendance;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         View::composer('partials.navbar', function ($view) {

            $todayAttendance = null;

            if (session()->has('user')) {

                $user = session('user');

                $todayAttendance = Attendance::where('user_id', $user['id'])
                    ->whereDate('date', Carbon::today())
                    ->first();
            }

            $view->with('todayAttendance', $todayAttendance);

        });
    }
}
