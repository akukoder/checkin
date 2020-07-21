<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // Using Closure based composers...
        View::composer('partials.navs.auth', function ($view) {
            $manager = app('impersonate');

            $url = ($manager->isImpersonating()) ? route('impersonate.leave') : '';

            $view->with([
                'impersonating' => $manager->isImpersonating(),
                'url' => $url
            ]);
        });
    }
}
