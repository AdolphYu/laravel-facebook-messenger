<?php

namespace AdolphYu\FBMessenger;


use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Providers\FBMSGServiceProvider;
use Illuminate\Support\Facades\Route;
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

        $this->registerRoutes();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/fb-messenger.php', 'fb-messenger');
        $this->app->register(FBMSGServiceProvider::class);
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'../../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return config('fb-messenger.route_config',[]);
    }

}
