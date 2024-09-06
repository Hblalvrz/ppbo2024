<?php

class Publisher
{
    private $name;
    private $address;
    private $phone;

    public function __construct($name, $address, $phone) 
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function setPhone($phone) 
    {
        $this->phone = $phone;
    }

    public function getPhone() : string 
    {
        return $this->phone;
    }
}