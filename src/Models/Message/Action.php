<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class Action
 * @package AdolphYu\FBMessenger\Models\Message
 */
class Action extends Model
{
    public $type;
    public $url;
    public $messenger_extensions;
    public $webview_height_ratio;
    public $fallback_url;

    public function __construct($action)
    {
        if(isset($action['type'])){
            $this->type = $action['type'];
        }
        if(isset($action['url'])){
            $this->url = $action['url'];
        }
        if(isset($action['messenger_extensions'])){
            $this->messenger_extensions = $action['messenger_extensions'];
        }
        if(isset($action['webview_height_ratio'])){
            $this->webview_height_ratio = $action['webview_height_ratio'];
        }
        if(isset($action['fallback_url'])){
            $this->fallback_url = $action['fallback_url'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'type'=>$this->type,
            'url'=>$this->url,
            'messenger_extensions'=>$this->messenger_extensions,
            'webview_height_ratio'=>$this->webview_height_ratio,
            'fallback_url'=>$this->fallback_url,
        ],function ($k,$v){
            return $v!=''||$v!=[]||$v!=null;
        },ARRAY_FILTER_USE_BOTH);
    }


}
