<?php

namespace FluntPhp\Validations;
use FluntPhp\Notifications\Notifiable;

class Contract extends Notifiable
{
    use StringValidationContract;
    use BoolValidationContract;

    public function requires()
    {
        return $this;
    }
    
}
