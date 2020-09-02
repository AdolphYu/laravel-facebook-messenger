<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Exceptions\UnknownTypeException;
use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;

use AdolphYu\FBMessenger\Models\User\Recipient;
use AdolphYu\FBMessenger\Models\User\Sender;

class MessageMessaging extends Messaging
{

    public $method = FBMSG::TYPE_POST;
    public $route = 'me/messages';

    public $sender;
    public $recipient;
    public $timestamp;
    public $message;
    public $messaging_type;
    public $tag;
    public $persona_id;

    const MESSAGING_TYPE_RESPONSE = 'RESPONSE';
    const MESSAGING_TYPE_UPDATE = 'UPDATE';
    const MESSAGING_TYPE_MESSAGE_TAG = 'MESSAGE_TAG';

    public function __construct($messaging)
    {
        if(isset($messaging['sender'])){
            $this->sender = new Sender($messaging['sender']);
        }

        if(isset($messaging['recipient'])) {
            $this->recipient = new Recipient($messaging['recipient']);
        }

        if(isset($messaging['timestamp'])) {
            $this->timestamp = $messaging['timestamp'];
        }

        if(isset($messaging['message'])) {
            $this->message = new Message($messaging['message']);
        }

        if(isset($messaging['messaging_type'])) {
            $this->messaging_type = $messaging['messaging_type'];
        }

        if(isset($messaging['tag'])) {
            $this->tag = $messaging['tag'];
        }

        if(isset($messaging['persona_id'])) {
            $this->persona_id = $messaging['persona_id'];
        }

    }

    public function toArray()
    {
        return array_filter([
            'sender'=>$this->sender?$this->sender->toArray():null,
            'recipient'=>$this->recipient?$this->recipient->toArray():null,
            'timestamp'=>$this->timestamp,
            'message'=>$this->message?$this->message->toArray():null,
            'messaging_type'=>$this->messaging_type,
            'tag'=>$this->tag,
            'persona_id'=>$this->persona_id,
        ]);
    }

    /**
     * addElement
     * @param $element
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addElement($element){
        $this->message->addElement($element);
        return $this;
    }

    /**
     * addButton
     * @param $button
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addButton($button)
    {
        $this->message->addButton($button);
        return $this;
    }

    /**
     * setPayload
     * @param $payload
     * @return $this
     * @throws UnknownTypeException
     */
    public function setPayload($payload){
        $this->message->setPayload($payload);
        return $this;
    }

    /**
     * setTag
     * @param $tag
     * @return $this
     */
    public function setTag($tag){
        if(in_array($tag,['CONFIRMED_EVENT_UPDATE','POST_PURCHASE_UPDATE','ACCOUNT_UPDATE','HUMAN_AGENT'])){
            $this->messaging_type = self::MESSAGING_TYPE_MESSAGE_TAG;
            $this->tag = $tag;
        }
        return $this;
    }

    /**
     * setPersona
     * @param $persona_id
     * @return $this
     */
    public function setPersona($persona_id){
        $this->persona_id = $persona_id;
        return $this;
    }

    /**
     * setPostId
     * @param $post_id
     * @return $this
     */
    public function setPostId($post_id){
        $this->recipient->setPostId($post_id);
        return $this;
    }


}
