<?php

use PHPUnit\Framework\TestCase;
use FluntPhp\Validations\Contract;

class StringValidationContractTests extends TestCase
{
    public function testIsNotNullOrEmpty()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->isNotNullOrEmpty(null, "string", "String is null")
                    ->isNotNullOrEmpty("", "string", "String is Empty");

        $this->assertTrue($wrong->invalid());
        $this->assertEquals(2, count($wrong->notifications()));

        $right = (new Contract)
                    ->requires()
                    ->isNotNullOrEmpty("Some valid string", "string", "String is Null");
         $this->assertTrue($right->valid());
    }
}