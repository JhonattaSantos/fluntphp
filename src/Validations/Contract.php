<?php

namespace FluntPhp\Validations;
use FluntPhp\Notifications\Notifiable;

class Contract extends Notifiable
{
    use StringValidationContract;

    public function requires()
    {
        return $this;
    }

    
}
