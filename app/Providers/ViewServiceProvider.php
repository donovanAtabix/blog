<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {

            if (auth()->user()) {
                $view->with(['thumb' => auth()->user()->getFirstMediaUrl('avatar', 'thumb')]);
            }
        });
    }
}
