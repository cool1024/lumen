<?php

namespace App\Sdk;

use Illuminate\Support\ServiceProvider;

class SdkServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Sdk\SdkContract', 'App\Sdk\SdkService');
    }
}
