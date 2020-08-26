<?php


namespace AdolphYu\FBMessenger;

use AdolphYu\FBMessenger\Models\Messaging\Messaging;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Broadcasting\BroadcastException;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;

/**
 * Class Bot
 * @package Casperlaitw\LaravelFbMessenger\Contracts
 */
class FBMSG
{
    /**
     * Request type GET
     */
    const TYPE_GET = 'get';

    /**
     * Request type POST
     */
    const TYPE_POST = 'post';

    /**
     * Request type DELETE
     */
    const TYPE_DELETE = 'delete';

    /**
     * FB Messenger API Url
     *
     * @var string
     */
    protected $apiUrl = 'https://graph.facebook.com/v2.6/';

    /**
     * @var null|string
     */
    protected $token = null;

    /**
     * @var null
     */
    private $debug = null;

    /**
     * @var null|string
     */
    private $secret = null;

    public $app;

    /**
     * FBMSG constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->client = new Client(['base_uri' => $this->apiUrl]);
        $this->token = $this->app->get('config')->get('fb-messenger.app_token');
        $this->setSecret($this->app->get('config')->get('fb-messenger.app_secret'));
    }

    /**
     * 设置配置
     * @return $this
     */
    public function setConfig($token,$secret){
        $this->token = $token;
        $this->setSecret($secret);
        return $this;
    }


    /**
     * @param $debug
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }


    /**
     * @param $secret
     * @return $this
     */
    public function setSecret($secret)
    {
        if ($secret) {
            $this->secret = hash_hmac('sha256', $this->token, $secret);
        }
    }

    /**
     * Request to API
     * @param $url
     * @param $data
     * @param string $type
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function call($url, $data, $type = self::TYPE_POST)
    {
        try {
            $options = [
                'query' => [
                    'access_token' => $this->token,
                ],
            ];

            if ($this->secret) {
                $options['query']['appsecret_proof'] = $this->secret;
            }

            switch ($type) {
                case self::TYPE_DELETE:
                case self::TYPE_POST:
                    $options = array_merge($options, [
                        'headers' => [
                            'Content-Type' => 'application/json'
                        ],
                        'body' => json_encode($data),
                    ]);
                    break;
                case self::TYPE_GET:
                    $options['query'] = array_merge($options['query'], $data);
                    break;
            }

            $response = $this->client->request(
                $type,
                $url,
                $options
            );

            return json_decode($response->getBody(), true);
        } catch (ClientException $ex) {
            return json_decode($ex->getResponse()->getBody(), true);
        }
    }

    public function send(Messaging $message, $type = self::TYPE_POST)
    {
        return $this->call($message->getRoute(), $message->toArray(),$message->getMethod());
    }

    public function receive($request){
        $receive = new Receiver($request);
        $receive->process();
    }





}
