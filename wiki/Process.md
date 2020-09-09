

# Processes

The `Process` will process the information sent by facebook messenger

## MessageProcess
###First,we look at the configuration file 

fb-messenger.php
```php
<?php
return [
    'webhook'=>[
        'messages'=>true,//like this
    ]
];

```

If `messages` is set to true and the match is successful, then it will trigger the `MessageEvent` event


### Second,add Listener to the `$listen` property in `EventServiceProvider`

```php
<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use AdolphYu\FBMessenger\Events\Message\MessageEvent;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MessageEvent::class => [
            YourListener::class,//like this
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

```
### Third,write your code in YourListener
YourListener 
```php
<?php

namespace App\Listeners;

use App\Events\Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use AdolphYu\FBMessenger\Events\Message\MessageEvent;

class YourListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageEvent  $event
     * @return void
     */
    public function handle(MessageEvent $event)
    {
        //Your code
        dd($event->data); //like this
    }
}

```

[Facebook document](https://developers.facebook.com/docs/messenger-platform/reference/webhook-events/messages)

Code of [MessageProcess](https://github.com/AdolphYu/laravel-facebook-messenger/blob/master/src/Processes/MessageProcess.php)

## Other reference source code 