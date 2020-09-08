<?php

namespace AdolphYu\FBMessenger;

use AdolphYu\FBMessenger\Events\AudioEvent;
use AdolphYu\FBMessenger\Events\FileEvent;
use AdolphYu\FBMessenger\Events\ImageEvent;
use AdolphYu\FBMessenger\Events\MessageEvent;
use AdolphYu\FBMessenger\Events\QuickReplyEvent;
use AdolphYu\FBMessenger\Events\VideoEvent;
use AdolphYu\FBMessenger\Exceptions\UnknownTypeException;
use AdolphYu\FBMessenger\Models\Page;
use AdolphYu\FBMessenger\Processes\ProcessInterface;

class Receiver
{
    public $processes;

    public function __construct($app)
    {
        $this->processes = collect();
    }

    public function handle($request){
       foreach($this->processes as $process){
           if($process instanceof ProcessInterface){
               $process->handle($request->all());
           }else{
               throw new UnknownTypeException('This process not implements ProcessInterface');
           }
       }
    }

    public function addProcess(ProcessInterface $process){
        $this->processes->push($process);
        return $this;
    }


}
