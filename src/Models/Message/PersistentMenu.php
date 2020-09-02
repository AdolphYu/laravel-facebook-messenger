<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

/**
 *
 * Class PersistentMenu
 * @package AdolphYu\FBMessenger\Models\Message
 */
class PersistentMenu extends Model
{
    public $locale;
    public $composer_input_disabled;
    public $call_to_actions;


    /**
     * Button constructor.
     * @param $button
     */
    public function __construct($menu)
    {
        if(isset($menu['locale'])){
            $this->locale = $menu['locale'];
        }

        if(isset($menu['composer_input_disabled'])){
            $this->composer_input_disabled = $menu['composer_input_disabled'];
        }

        $this->call_to_actions = collect();
        if(isset($menu['call_to_actions'])){
            foreach ($menu['call_to_actions'] as $call_to_action){
                $this->call_to_actions->push(new Button($call_to_action));
            }
        }

    }

    public function toArray()
    {
        return array_filter([
            'locale'=>$this->locale,
            'composer_input_disabled'=>$this->composer_input_disabled,
            'call_to_actions'=>$this->call_to_actions->toArray(),

        ],function ($k,$v){
            return $v!=''||$v!=[]||$v!=null;
        },ARRAY_FILTER_USE_BOTH);
    }


}
