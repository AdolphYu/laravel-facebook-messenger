<?php

namespace AdolphYu\FBMessenger\Models\User;

use AdolphYu\FBMessenger\Models\Model;

abstract class User extends Model
{
    public $id;
    public $post_id;
    public $comment_id;

    public function __construct($user)
    {
        if(isset($user['id'])){
            $this->id = $user['id'];
        }
        if(isset($user['post_id'])){
            $this->post_id = $user['post_id'];
        }
        if(isset($user['comment_id'])){
            $this->comment_id = $user['comment_id'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'id'=>$this->id,
            'post_id'=>$this->post_id,
            'comment_id'=>$this->comment_id,
        ]);
    }

    /**
     * setPostId
     * @param $post_id
     * @return $this
     */
    public function setPostId($post_id){
        $this->post_id = $post_id;
        return $this;
    }

}
