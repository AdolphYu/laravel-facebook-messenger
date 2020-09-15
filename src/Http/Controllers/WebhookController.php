<?php

namespace AdolphYu\FBMessenger\Http\Controllers;


use AdolphYu\FBMessenger\Facades\FBMSG;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class WebhookController
 */
class WebhookController extends Controller
{


    /**
     * Webhook verify request
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response|void
     * @throws \InvalidArgumentException
     */
    public function verification(Request $request)
    {
        if ($request->get('hub_mode') === 'subscribe'
            && $request->get('hub_verify_token') === config('fb-messenger.verify_token')) {
            return new Response($request->get('hub_challenge'));
        }
        abort(422, 'Not found resources');
    }

    /**
     * Receive the webhook request
     *
     * @param Request $request
     */
    public function receive(Request $request)
    {
        FBMSG::receive($request);
    }
}
