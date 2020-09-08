Not yet completed


# Laravel Facebook Messenger

This is a laravel package for Facebook Messenger Platform API.

Easy to making your facebook messenger.

## Installation

### Composer

```shell
Not completed yet
```

## Laravel

### Add Provider
In your `config/app.php` add  `AdolphYu\FBMessenger\PackageServiceProvider::class` to the providers array:
```php
'providers' => [
    ...
    AdolphYu\FBMessenger\PackageServiceProvider::class,
    ...
],

'alias => [
    ...
    'FBMSG' => AdolphYu\FBMessenger\Facades\FBMSG::class,
    ...
],
```

### Publish Configuration
```shell
php artisan vendor:publish --provider="AdolphYu\FBMessenger\PackageServiceProvider" --tag="config"
```

## Configuration 

### Security

Almost every API request with `access_token`, if you want to improved security in your app,
you can use `appsecret_proof`. Please add `MESSENGER_APP_SECRET` to `.env` file and enable proof on all calls.
*If you don't know how to get secret token and enabled proof, please checkout [Graph Api](https://developers.facebook.com/docs/graph-api/securing-requests)*

`.env`
```
MESSENGER_APP_SECRET="APP SECRET TOKEN"
```

### Token
Add you token to `.env` file or modify `fb-messenger.php` config.

*If you don't know how to get token, please checkout [Facebook Developer](https://developers.facebook.com/docs/messenger-platform/quickstart)*


`.env`
```
...
MESSENGER_VERIFY_TOKEN="By You Writing"
MESSENGER_APP_TOKEN="Page Access Token"
...
```

### Custom Url
If you want to custom url, replace `/webhook` to you want.

Finally, you can run `php artisan route:list` to check.

```php
 return [
     'verify_token' => env('MESSENGER_VERIFY_TOKEN'),
     'app_token' => env('MESSENGER_APP_TOKEN'),
     'custom_url' => '/chatbot', // like this
 ];
```

### Processes
The `Process` will process the information sent by facebook messenger

THe `Process` must implement `ProcessInterface` interface. 
There is a method `handle` in the `ProcessInterface` , which processes the information sent by facebook messenger

You can check out [ProcessInterface](https://github.com/AdolphYu/laravel-facebook-messenger/blob/master/src/Processes/ProcessInterface.php)

If you need to add or customize process, you must implement this interface

```php
<?php

namespace App;
use AdolphYu\FBMessenger\Processes\Process;

class CustomProcess extends Process
{
    public function handle($data)
    {
        //your code
        dd($data);
    }
}

```


### Add code in the `boot` method of the `AppServiceProvider` or other `ServiceProvider`

```php
<?php

namespace App\Providers;

use App\CustomProcess;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->get('fbmsg')->addProcess(new CustomProcess());//like this
    }
}

```


## API
Not completed yet

## Commands
Not completed yet

## License

This package is licensed under the [MIT license](https://github.com/AdolphYu/laravel-facebook-messenger/blob/master/LICENSE).