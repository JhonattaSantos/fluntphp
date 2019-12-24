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

    public function hasLen($val, $len, $property, $message)
    {
        if(strlen(trim($val)) != $len){
            $this->addNotification($property, $message);
        }
        return $this;
    }

    public function areEquals($val, $text, $property, $message)
    {
        if($val != $text){
            $this->addNotification($property, $message);
        }
        return $this;
    }

    public function areNotEquals($val, $text, $property, $message)
    {
        if($val === $text){
            $this->addNotification($property, $message);
        }
        return $this;
    }

    public function isEmail($email, $property, $message)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addNotification($property, $message);
        }
        return $this;
    }

    public function isUrl($url, $property, $message)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $this->addNotification($property, $message);
        }
        return $this;
    }

    public function isCnpj($cnpj, $property, $message)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	
        // Valida tamanho
        if (strlen($cnpj) != 14){
            $this->addNotification($property, $message);
            return $this;
        }
            
        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj)){
            $this->addNotification($property, $message);
            return $this;
        }
            
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)){
            $this->addNotification($property, $message);
            return $this;
        }
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;

        if($cnpj{13} != ($resto < 2 ? 0 : 11 - $resto)){
            $this->addNotification($property, $message);
        }

        return $this;
    }

    public function isCpf($cpf, $property, $message)
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            $this->addNotification($property, $message);
            return $this;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $this->addNotification($property, $message);
            return $this;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                $this->addNotification($property, $message);
                return $this;
            }
        }

        return $this;
    }

    public function isTelefone($telefone, $property, $message)
    {
        $regex = '/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/';
        if (preg_match($regex, $telefone) == false) {
            $this->addNotification($property, $message);
        }
        return $this;
    }

    
}
