<?php

use PHPUnit\Framework\TestCase;
use FluntPhp\Validations\Contract;

class BoolValidationContractTests extends TestCase
{
    public function testIsFalse()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->isFalse(true, "boolean", "boolean is true");

        $this->assertTrue($wrong->invalid());
        $this->assertEquals(1, count($wrong->notifications()));

        $right = (new Contract)
                    ->requires()
                    ->isTrue(true, "boolean", "boolean is true");
         $this->assertTrue($right->valid());
    }
}