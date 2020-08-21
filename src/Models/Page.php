<?php

namespace AdolphYu\FBMessenger\Models;

use Illuminate\Support\Collection;

class Page extends Model
{
    public $id;
    public $time;
    public $messaging;

    public function __construct($page)
    {
        $this->id = $page['id'];
        $this->time = $page['time'];
        $this->messaging = collect();
        if(isset($page['messaging'])){
            foreach($page['messaging'] as $messaging){
                $this->messaging->push(new Messaging($messaging));
            }
        }
    }

    public function toArray()
    {
        return array_filter([
            'id'=>$this->id,
            'time'=>$this->time,
            'messaging'=>$this->messaging->toArray()

        ]);
        // TODO: Implement toArray() method.
    }

}
