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

    public function testIsNullOrEmpty()
    {
        $right = (new Contract())
                    ->requires()
                    ->isNullOrEmpty(null, "string", "String is Null")
                    ->isNullOrEmpty("", "string", "String is Empty");
        $this->assertTrue($right->valid());
        $this->assertEquals(0, count($right->notifications()));

        $wrong = (new Contract())
                    ->requires()
                    ->isNullOrEmpty("Some valid string", "string", "String is Null");
        $this->assertTrue($wrong->invalid());
    }

    public function testHasMinLen()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->hasMinLen("null", 5, "string", "String len is less than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(1, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->hasMinLen("Some Valid String", 5, "string", "String len is less than permited");

        $this->assertEquals(true,$right->valid());
    }

    
    public function testHasMaxLen()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->hasMaxLen("null", 3, "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(1, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->hasMaxLen("Some", 5, "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

    /*
    public function testHasLen()
    {

    }

    public function testAreEquals()
    {

    }

    public function testAreNotEquals()
    {

    }

    public function testIsEmail()
    {

    }

    public function testIsEmailOrEmpty()
    {

    }

    public function testIsUrl()
    {

    }

    public function testIsUrlOrEmpty()
    {

    }

    public function testIsDigit()
    {

    }*/
}