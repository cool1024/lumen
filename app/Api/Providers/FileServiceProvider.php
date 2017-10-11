<?php

namespace App\Api\Providers;

use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Api\Contracts\FileContract', 'App\Api\Services\FileService');

    }
}
