<?php

namespace Y0f\ImageToAscii;

use Illuminate\Support\ServiceProvider;

class ImageToAsciiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register any package services
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/Views', 'image-to-ascii');
        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/image-to-ascii'),
        ], 'image-to-ascii-views');
    }
}
