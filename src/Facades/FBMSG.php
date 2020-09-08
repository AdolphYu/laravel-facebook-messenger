<?php
namespace AdolphYu\FBMessenger\Facades;
use AdolphYu\FBMessenger\Models\Messaging\Messaging;
use Illuminate\Http\Request;
USE Illuminate\Support\Facades\Facade;

/**
 * @method static array send(Messaging $messaging)
 * @method static null receive(Request $request)
 *
 * @see \AdolphYu\FBMessenger\FBMSG
 */
class FBMSG extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fbmsg';
    }
}
