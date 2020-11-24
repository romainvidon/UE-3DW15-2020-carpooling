<?php

namespace App\Entities;

class Comments
{
    private $id;
    private $message;
    private $user_id;
    private $ad_id;

    /**
     * Get the value of id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the message id
     *
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the message id
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
 
        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getAdId()
    {
        return $this->ad_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setAdId($ad_id)
    {
        $this->ad_id = $ad_id;

        return $this;
    }
}
