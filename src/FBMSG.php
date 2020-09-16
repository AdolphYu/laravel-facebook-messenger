<?php


namespace AdolphYu\FBMessenger;

use AdolphYu\FBMessenger\Events\MessagingReferralEvent;
use AdolphYu\FBMessenger\Exceptions\ServiceException;
use AdolphYu\FBMessenger\Models\Messaging\Messaging;
use AdolphYu\FBMessenger\Models\Messaging\TextMessaging;
use AdolphYu\FBMessenger\Processes\MessageDeliveryProcess;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Processes\MessageProcess;
use AdolphYu\FBMessenger\Processes\MessageReactionProcess;
use AdolphYu\FBMessenger\Processes\MessagingAccountLinkingProcess;
use AdolphYu\FBMessenger\Processes\MessagingGamePlayProcess;
use AdolphYu\FBMessenger\Processes\MessagingHandoverProcess;
use AdolphYu\FBMessenger\Processes\MessagingOptinProcess;
use AdolphYu\FBMessenger\Processes\MessagingPolicyEnforcementProcess;
use AdolphYu\FBMessenger\Processes\MessagingPostbackProcess;
use AdolphYu\FBMessenger\Processes\MessagingReferralProcess;
use AdolphYu\FBMessenger\Processes\StandbyProcess;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Broadcasting\BroadcastException;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;

/**
 * Class FBMSG
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

    public $receive;
    /**
     * FBMSG constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->client = new Client(['base_uri' => $this->apiUrl]);
        $this->receive = new Receiver($app);
        $this->setReceiveProcess();
        $this->token = $this->app->get('config')->get('fb-messenger.app_token');
        $this->setSecret($this->app->get('config')->get('fb-messenger.app_secret'));
    }

    /**
     * setReceiveProcess
     */
    public function setReceiveProcess(){

        if($this->app->get('config')->get('fb-messenger.webhook.messages')){
            $this->receive->addProcess($this->app->make(MessageProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.message_deliveries')){
            $this->receive->addProcess($this->app->make(MessageDeliveryProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.message_echoes')){
            $this->receive->addProcess($this->app->make(MessageEchoProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.messaging_account_linking')){
            $this->receive->addProcess($this->app->make(MessagingAccountLinkingProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.messaging_game_plays')){
            $this->receive->addProcess($this->app->make(MessagingGamePlayProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.messaging_handovers')){
            $this->receive->addProcess($this->app->make(MessagingHandoverProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.messaging_optins')){
            $this->receive->addProcess($this->app->make(MessagingOptinProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.messaging_policy_enforcement')){
            $this->receive->addProcess($this->app->make(MessagingPolicyEnforcementProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.messaging_postbacks')){
            $this->receive->addProcess($this->app->make(MessagingPostbackProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.messaging_referrals')){
            $this->receive->addProcess($this->app->make(MessagingReferralProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.standby')){
            $this->receive->addProcess($this->app->make(StandbyProcess::class));
        }

        if($this->app->get('config')->get('fb-messenger.webhook.message_reactions')){
            $this->receive->addProcess($this->app->make(MessageReactionProcess::class));
        }

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
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function call($url, $data, $type = self::TYPE_POST)
    {

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

            try {
                $response = $this->client->request(
                    $type,
                    $url,
                    $options
                );
            } catch (ClientException $ex) {
                throw new ServiceException($ex->getResponse()->getBody(),$ex->getCode());
            }

            if($this->app->get('config')->get('fb-messenger.debug')){
                Log::info('FBMSG Send',[
                    'HttpMethod'=>$type,
                    'HttpUrl'=>$url,
                    'HttpOptions'=>$options,
                    'HttpResponse'=>json_decode($response->getBody(), true),
                ]);
            }

            return json_decode($response->getBody(), true);

    }

    /**
     * Send the messaging
     * @param Messaging $message
     * @return array
     */
    public function send(Messaging $message):array
    {
        return $this->call($message->getRoute(), $message->toArray(),$message->getMethod());
    }

    /**
     * Receive the webhook message
     * @param $request
     * @throws Exceptions\UnknownTypeException
     */
    public function receive($request):void{
        if($this->app->get('config')->get('fb-messenger.debug')){
            Log::info('FBMSG Receive',[
                'body'=>$request->all(),
            ]);
        }

        $this->receive->handle($request);
    }

    /**
     * addProcess
     * @param $process
     * @return $this
     */
    public function addProcess($process){
        $this->receive->addProcess($process);
        return $this;
    }




}
