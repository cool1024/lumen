<?php

namespace App\Api\Providers;

use Illuminate\Support\ServiceProvider;
use App\Api\Services\FileService;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Api\Contracts\ApiContract', 'App\Api\Services\ApiService');
    }
}
