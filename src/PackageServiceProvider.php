<?php

namespace AdolphYu\FBMessenger;


use AdolphYu\FBMessenger\FBMSG;
use Illuminate\Support\ServiceProvider;

/**
 * Class PackageServiceProvider
 */
class PackageServiceProvider extends ServiceProvider
{


    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/fb-messenger.php' => config_path('fb-messenger.php'),
            ], 'config');

        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/fb-messenger.php', 'fb-messenger');
    }

}
