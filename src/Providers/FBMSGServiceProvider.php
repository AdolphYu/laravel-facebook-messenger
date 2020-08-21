<?php

namespace  AdolphYu\FBMessenger\Providers;


use AdolphYu\FBMessenger\FBMSG;
use Illuminate\Support\ServiceProvider;

/**
 * Class FBMSGServiceProvider
 */
    class FBMSGServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton(FBMSG::class, function ($app) {
            return new FBMSG($app);
        });
    }

    public function provides()
    {
        return [FBMSG::class];
    }



}
