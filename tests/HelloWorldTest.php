<?php

class HelloWorldTest extends \PHPUnit\Framework\TestCase
{
    public function testHelloWorld()
    {
        $this->expectOutputString('Hello World!');

        include_once 'www/HelloWorld.php';
    }
}

?>