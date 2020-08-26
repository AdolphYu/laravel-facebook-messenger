<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Exceptions\UnknownTypeException;
use AdolphYu\FBMessenger\Models\Model;

class Message extends Model
{
    public $mid;
    public $text;
    public $quick_reply;
    public $reply_to;
    public $attachments;
    public $attachment;
    public $referral;
    public $quick_replies;
    public $postback;


    public function __construct($message)
    {
        if(isset($message['mid'])){
            $this->mid = $message['mid'];
        }

        if(isset($message['text'])){
            $this->text = $message['text'];
        }


        if(isset($message['quick_reply'])){
            $this->quick_reply = new QuickReply($message['quick_reply']);
        }

        $this->quick_replies = collect();
        if(isset($message['quick_replies'])){
            foreach($message['quick_replies'] as $quick_reply){
                $this->quick_replies->push(new QuickReply($quick_reply));
            }
        }

        if(isset($message['reply_to'])){
            $this->reply_to = new Message($message['reply_to']);
        }

        $this->attachments = collect();
        if(isset($message['attachments'])){
            foreach($message['attachments'] as $attachment){
                $this->attachments->push(new Attachment($attachment));
            }
        }

        if(isset($message['attachment'])){
            $this->attachment = new Attachment($message['attachment']);
        }

        if(isset($message['referral'])){
            $this->referral = new Product($message['referral']);
        }

        if(isset($message['postback'])){
            $this->postback = new Postback($message['postback']);
        }


    }

    public function toArray()
    {
        return array_filter([
            'mid'=>$this->mid,
            'text'=>$this->text,
            'quick_reply'=>$this->quick_reply?$this->quick_reply->toArray():null,
            'reply_to'=>$this->reply_to?$this->reply_to->toArray():null,
            'attachments'=>$this->attachments->toArray(),
            'attachment'=>$this->attachment?$this->attachment->toArray():null,
            'referral'=>$this->referral?$this->referral->toArray():null,
            'quick_replies'=>$this->quick_replies->toArray(),
            'postback'=>$this->postback?$this->postback->toArray():null,
        ]);
    }


    /**
     * Is it a quick reply?
     * @return bool
     */
    public function isQuickReply(){
        return $this->quick_reply?true:false;
    }

    /**
     * Is it a attachment?
     * @return bool
     */
    public function isAttachment(){
        return $this->attachments->isEmpty()?false:true;
    }

    /**
     * Is it a message?
     * @return bool
     */
    public function isMessage(){
        return true;
    }

    /**
     * Is it a postback?
     * @return bool
     */
    public function isPostback(){
        return $this->postback?true:false;
    }

    /**
     * addQuickReply
     * @param $quickReply
     * @return $this
     * @throws UnknownTypeException
     */
    public function addQuickReply($quickReply){
        if($quickReply instanceof QuickReply) {
            $this->quick_replies->push($quickReply);
        }elseif (is_array($quickReply)){
            $this->quick_replies->push(new QuickReply($quickReply));
        }else{
            throw new UnknownTypeException('QuickReply type error');
        }
        return $this;
    }

    /**
     * addElement
     * @param $element
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addElement($element){
        $this->attachment->addElement($element);
        return $this;
    }

    /**
     * addButton
     * @param $button
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addButton($button){
        $this->attachment->addButton($button);
        return $this;
    }

    /**
     * setPayload
     * @param $payload
     * @return $this
     * @throws UnknownTypeException
     */
    public function setPayload($payload){
        $this->attachment->setPayload($payload);
        return $this;
    }


    /**
     * addBoardingPass
     * @param $boardingPass
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addBoardingPass($boardingPass){
        $this->attachment->addBoardingPass($boardingPass);
        return $this;
    }



}
