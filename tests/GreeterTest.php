<?php

class GreeterTest extends \PHPUnit\Framework\TestCase {
    public function testGreet() {
        $greeter = new \user_interactions\Greeter("Sam");

        $result = $greeter->sayHello();

        $this->assertEquals("Hello Sam !" , $result);
    }

    public function testFindUnknownFavouriteFood() {
        $greeter = new \user_interactions\Greeter("Sam");

        $result = $greeter->findFavouriteFood();

        $this->assertEquals("I don't know your favourite food." , $result);
    }

    public function testFindFavouriteFood() {
        $greeter = new \user_interactions\Greeter("Bob");

        $result = $greeter->findFavouriteFood();

        $this->assertEquals("Your favourite food are Lasagnes." , $result);
    }
}

?>