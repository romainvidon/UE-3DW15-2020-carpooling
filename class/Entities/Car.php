<?php

namespace App\Entities;

class Car
{
    private $id;
    private $brand;
    private $model;
    private $maxslots;
    private $user_id;
    
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */
    public function setModel($model)
    {
        $this->model = $model;

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
     * Get the value of maxslots
     */
    public function getMaxslots()
    {
        return $this->maxslots;
    }

    /**
     * Set the value of maxslots
     */
    public function setMaxslots($maxslots)
    {
        $this->maxslots = $maxslots;
    }

    /**
     * Get the value of brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }
}
