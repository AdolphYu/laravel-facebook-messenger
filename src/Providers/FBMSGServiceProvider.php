<?php

namespace  AdolphYu\FBMessenger\Providers;


use AdolphYu\FBMessenger\FBMSG;
use Illuminate\Support\ServiceProvider;

/**
 * Class FBMSGServiceProvider
 */
    class FBMSGServiceProvider extends ServiceProvider
{

        protected $configPath = __DIR__ . '/../config/fb-messenger.php';
    /**
     *
     */
    public function boot()
    {

    }

    public function register()
    {

        $this->app->singleton('fbmsg', function ($app) {
            return new FBMSG($app);
        });
    }

    public function provides()
    {
        return ['fbmsg'];
    }



}
