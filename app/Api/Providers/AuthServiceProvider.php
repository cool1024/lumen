<?php

namespace App\Api\Providers;

use Illuminate\Support\ServiceProvider;
use App\Api\Services\AuthService;

class AuthServiceProvider extends ServiceProvider
{

    private $service;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('auth', function () {
            return new AuthService();
        });

        $this->app->bind('App\Api\Contracts\AuthContract', function () {
            if (!isset($this->service)) {
                $this->service=new AuthService();
            }
            return $this->service;
        });
    }
}
