<?php

class GreeterTest extends \PHPUnit\Framework\TestCase {
    public function testGreet() {
        $greeter = new \user_interactions\Greeter("Sam");

        $result = $greeter->sayHello();

        $this->assertEquals("Hello Sam !" , $result);
    }
}

?>