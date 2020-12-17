<?php

namespace App\Providers;

use App\Order;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share([
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object)[];
            },
            'locale' => function () {
                return app()->getLocale();
            },
            'language' => function () {
                return translations(
                    resource_path('lang/'. app()->getLocale() .'.json')
                );
            },
            'flash' => function () {
                return Session::get('toast');
            },
            // 'loggedIn' => Auth::check(),
            'popstate' => false,
        ]);

        Inertia::share('auth.user', function () {
            return[
                'loggedIn' => Auth::check(),
            ];
        });

        Inertia::share('order', function () {
            return[
                'total' => Order::where('order_status_id', 1)->count(),
            ];
        });
    }
}
