<?php

namespace AdolphYu\FBMessenger\Models\User;

use AdolphYu\FBMessenger\Models\Model;

abstract class User extends Model
{
    public $id;

    public function __construct($user)
    {
        if(isset($user['id'])){
            $this->id = $user['id'];
        }
    }

    public function toArray()
    {
        return [
            'id'=>$this->id
        ];
    }

}
