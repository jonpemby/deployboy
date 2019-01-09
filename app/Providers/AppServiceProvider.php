<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use App\DigitalOcean\Connector;
use App\DigitalOcean\Contracts\Connector as ConnectorInterface;
use App\DigitalOcean\Contracts\Decorator;
use App\DigitalOcean\Decorators\ProfileConnector;
use App\DigitalOcean\Decorators\CachedConnector;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ConnectorInterface::class, Connector::class);

        $this->app->when(Connector::class)
             ->needs(Client::class)
             ->give(function () {
                 return new Client(['base_uri' => config('digitalocean.api_url')]);
             });

        $this->app->bind(Decorator::class, function ($app) {
            $connector = $app->make(ConnectorInterface::class);

            if (config('digitalocean.cache')) {
                return new CachedConnector($connector);
            }

            return new ProfileConnector($connector);
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
