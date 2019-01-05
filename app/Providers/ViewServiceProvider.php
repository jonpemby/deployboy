<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Allow a view to remove the navigation include.
         */
        View::composer('*', function ($view) {
            if (! isset($view->omit_nav)) {
                $view->omit_nav = false;
            }

            return $view;
        });

        /**
         * Allow a view to remove the footer include.
         */
        View::composer('*', function ($view) {
            if (! isset($view->omit_footer)) {
                $view->omit_footer = false;
            }

            return $view;
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
