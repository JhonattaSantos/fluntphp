<?php

namespace FluntPhp\Validations;
use FluntPhp\Notifications\Notifiable;

class Contract extends Notifiable
{
    use StringValidationContract;
    use BoolValidationContract;
    use ArrayValidationContract;

    public function requires()
    {
        return $this;
    }
    
}
