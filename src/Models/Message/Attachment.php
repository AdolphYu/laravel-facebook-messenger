<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Exceptions\UnknownTypeException;
use AdolphYu\FBMessenger\Models\Model;

class Attachment extends Model
{
    public $type;
    public $payload;

    public function __construct($attachment)
    {
        if(isset($attachment['type'])){
            $this->type = $attachment['type'];
        }

        if(isset($attachment['payload'])){
            $this->payload =  new Payload($attachment['payload']);
        }
    }

    public function toArray()
    {
        return array_filter([
            'type'=>$this->type,
            'payload'=>$this->payload?$this->payload->toArray():null
        ]);
    }

    /**
     * Is it a audio?
     * @return bool
     */
    public function isAudio(){
        return $this->type=='audio';
    }

    /**
     * Is it a file?
     * @return bool
     */
    public function isFile(){
        return $this->type=='file';
    }

    /**
     * Is it a image?
     * @return bool
     */
    public function isImage(){
        return $this->type=='image';
    }

    /**
     * Is it a video?
     * @return bool
     */
    public function isVideo(){
        return $this->type=='video';
    }

    /**
     * addElement
     * @param $element
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addElement($element){
        $this->payload->addElement($element);
        return $this;
    }

    /**
     * addButton
     * @param $button
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addButton($button){
        $this->payload->addButton($button);
        return $this;
    }

    /**
     * setPayload
     * @param $payload
     * @return $this
     * @throws UnknownTypeException
     */
    public function setPayload($payload){
        if($payload instanceof Payload){
            $this->payload = $payload;
        }elseif(is_array($payload)){
            $this->payload = new Payload($payload);
        }else{
            throw new UnknownTypeException('Element type error');
        }
        return $this;
    }

    /**
     * addBoardingPass
     * @param $boardingPass
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addBoardingPass($boardingPass){
        $this->payload->addBoardingPass($boardingPass);
        return $this;
    }

}
