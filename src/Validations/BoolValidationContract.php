<?php

namespace FluntPhp\Validations;

trait BoolValidationContract
{
    public function isFalse($val, $property, $message)
    {
        if($val){
            $this->addNotification($property, $message);
        }
        return $this;
    }

    public function isTrue($val, $property, $message)
    {
        $this->isFalse(!$val, $property, $message);
        return $this;
    }
}