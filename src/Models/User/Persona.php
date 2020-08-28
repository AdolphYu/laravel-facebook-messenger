<?php

namespace AdolphYu\FBMessenger\Models\User;

class Persona extends User
{
    public $name;
    public $profile_picture_url;

    public function __construct($persona)
    {
        if(isset($persona['name'])){
            $this->name = $persona['name'];
        }

        if(isset($persona['profile_picture_url'])){
            $this->profile_picture_url = $persona['profile_picture_url'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'id'=>$this->id,
            'name'=>$this->name,
            'profile_picture_url'=>$this->profile_picture_url,
        ]);

    }

}
