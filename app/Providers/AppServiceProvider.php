<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->when(\App\DigitalOcean\ProfileManager::class)
             ->needs(\GuzzleHttp\Client::class)
             ->give(function () {
                 return new \GuzzleHttp\Client(['base_uri' => 'https://api.digitalocean.com/v2/']);
             });
    }

    /**
     * Register any application services.
     *
     * @return void
     */ public function register() {
        //
    }
}
