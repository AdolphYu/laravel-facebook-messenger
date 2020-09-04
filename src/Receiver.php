<?php

namespace AdolphYu\FBMessenger;

use AdolphYu\FBMessenger\Events\AudioEvent;
use AdolphYu\FBMessenger\Events\FileEvent;
use AdolphYu\FBMessenger\Events\ImageEvent;
use AdolphYu\FBMessenger\Events\MessageEvent;
use AdolphYu\FBMessenger\Events\QuickReplyEvent;
use AdolphYu\FBMessenger\Events\VideoEvent;
use AdolphYu\FBMessenger\Models\Page;

class Receiver
{
    public $object;
    public $entry;

    public $processes;

    public function __construct($receiver)
    {
        $this->processes = collect();
        $this->object = $receiver['object'];
        $this->entry = collect();
        if(isset($receiver['enter'])){
            foreach ($receiver['enter'] as $page){
                $this->entry->push(new Page($page));
            }
        }
    }

    /**
     * process this message
     */
    public function process(){
        foreach ($this->entry as $page){
            foreach ($page->messaging as $messaging){
                if($messaging->isPostback()){
                    event(new PostbackEvent($messaging));
                }elseif($messaging->isMessage()){
                    event(new MessageEvent($messaging));
                    if($messaging->isQuickReply()){
                        event(new QuickReplyEvent($messaging));
                    }elseif($messaging->isAttachment()){
                        event(new AttachmentMessageEvent($messaging));
                        foreach($messaging->attachments as $attachment){
                            switch ($attachment->type){
                                case 'image':
                                    event(new ImageEvent($messaging));
                                    break;
                                case 'audio':
                                    event(new AudioEvent($messaging));
                                    break;
                                case 'video':
                                    event(new VideoEvent($messaging));
                                    break;
                                case 'file':
                                    event(new FileEvent($messaging));
                                    break;
                            }
                        }
                    }
                }
            }
        }
    }

    public function analytics(){
       foreach($this->processes as $process){
           $process->handle($this->object);
       }
    }

    public function addProcess($process){
        $this->processes->push($process);
    }


}
