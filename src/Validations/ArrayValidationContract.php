<?php

namespace FluntPhp\Validations;

trait ArrayValidationContract
{
    public function isEmpty($val, $property, $message)
    {
        if(!empty($val)){
            $this->addNotification($property, $message);
        }
        return $this;
    }

    public function isNotEmpty($val, $property, $message)
    {
        if(empty($val)){
            $this->addNotification($property, $message);
        }
        return $this;
    }
}