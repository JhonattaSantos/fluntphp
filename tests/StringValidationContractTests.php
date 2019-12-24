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


    public function testHasLen()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->hasLen("null", 3, "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(1, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->hasLen("Some", 4, "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

   
    public function testAreEquals()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->areEquals("null", "", "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(1, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->areEquals("Some", "Some", "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

    
    public function testAreNotEquals()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->areNotEquals("null", "null", "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(1, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->areNotEquals("Some", "Somes", "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

    
    public function testIsEmail()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->isEmail("email.com", "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(1, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->isEmail("jhonattasantoss@hotmail.com", "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

    
    public function testIsUrl()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->isUrl("google.com", "string", "String len is more than permited")
                    ->isUrl("email.com", "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(2, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->isUrl("http://google.com?q=teste", "string", "String len is less than permited")
                ->isUrl("http://google.com", "string", "String len is less than permited")
                ->isUrl("https://google.com", "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

    public function testIsCnpj()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->isCnpj("aa", "string", "String len is more than permited")
                    ->isCnpj("95956", "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(2, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->isCnpj("34981713000103", "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

    public function testIsCpf()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->isCpf("aa", "string", "String len is more than permited")
                    ->isCpf("95956", "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(2, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->isCpf("94259509977", "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

    public function testIsTelefone()
    {
        $wrong = (new Contract())
                    ->requires()
                    ->isTelefone("aa", "string", "String len is more than permited")
                    ->isTelefone("95956", "string", "String len is more than permited");
        $this->assertEquals(false, $wrong->valid());
        $this->assertEquals(2, count($wrong->notifications()));

        $right = (new Contract())
                ->requires()
                ->isTelefone("+55 (11) 98888-8888", "string", "String len is less than permited")
                ->isTelefone("(11)99999-9999", "string", "String len is less than permited")
                ->isTelefone("5511988888888", "string", "String len is less than permited")
                ->isTelefone("21 98888-8888", "string", "String len is less than permited")
                ->isTelefone("9999-9999", "string", "String len is less than permited")
                ->isTelefone("82997162726", "string", "String len is less than permited")
                ->isTelefone("8225803990", "string", "String len is less than permited");

        $this->assertEquals(true, $right->valid());
    }

}