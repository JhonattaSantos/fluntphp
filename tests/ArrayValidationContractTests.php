<?php

use PHPUnit\Framework\TestCase;
use FluntPhp\Validations\Contract;

class ArrayValidationContractTests extends TestCase
{
    public function testIsEmpty()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->isEmpty(['key' => 'value'], "array", "array is empty");

        $this->assertTrue($wrong->invalid());
        $this->assertEquals(1, count($wrong->notifications()));

        $right = (new Contract)
                    ->requires()
                    ->isNotEmpty(['key' => 'value'], "array", "array dont empty");
         $this->assertTrue($right->valid());
    }
}