<?php

namespace FluntPhp\Notifications;

class Notification 
{
    protected $property;
    protected $message;

    public function __construct($property, $message)
    {
        $this->property = $property;
        $this->message = $message;
    }

    public function property()
    {
        return $this->property;
    }

    public function message()
    {
        return $this->message;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}