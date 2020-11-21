<?php

namespace App\Entities;

class Comment
{
    private $id;
    private $message;
    private $user_id;
    private $ad_id;

    public function getId() : string
    {
        return $this->id;
    }

    public function setId($id) : void
    {
        $this->id = $id;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function setMessage($message) : void
    {
        $this->message = $message;
    }

    public function getUserId() : string
    {
        return $this->user_id;
    }

    public function setUserId($user_id) : void
    {
        $this->user_id = $user_id;
    }

    public function getAdId() : string
    {
        return $this->ad_id;
    }

    public function setAdId($ad_id) : void
    {
        $this->ad_id = $ad_id;
    }
}
