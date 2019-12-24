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

    public function isNullOrEmpty($val, $property, $message)
    {
        if(!empty($val)){
            $this->addNotification($property, $message);
        }

        return $this;
    }

    public function hasMinLen($val, $min, $property, $message)
    {
        if((empty(trim($val)) || is_null($val)) || strlen(trim($val)) < $min){
            $this->addNotification($property, $message);
        }
        return $this;
    }

    public function hasMaxLen($val, $max, $property, $message)
    {
        if(strlen(trim($val)) > $max){
            $this->addNotification($property, $message);
        }
        return $this;
    }

    
}
