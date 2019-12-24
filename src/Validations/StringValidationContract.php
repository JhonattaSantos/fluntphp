<?php

namespace FluntPhp\Validations;

trait StringValidationContract
{
    public function isNotNullOrEmpty($val, $property, $message)
    {
        if(empty(trim($val)) || is_null($val)){
            $this->addNotification($property, $message);
        }
        return $this;
    }
}
