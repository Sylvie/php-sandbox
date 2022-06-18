<?php

class GreeterTest extends \PHPUnit\Framework\TestCase {
    public function testGreet() {
        $dbMock = $this->createMock(mysqli::class);

        $greeter = new \user_interactions\Greeter($dbMock, "Sam");

        $result = $greeter->sayHello();

        $this->assertEquals("Hello Sam !" , $result);
    }

    public function testFindUnknownFavouriteFood() {
        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->expects($this->once())
            ->method('fetch_array')
            ->with()
            ->willReturn(false);

        $dbMock = $this->createMock(mysqli::class);
        $dbMock->expects($this->once())
            ->method('query')
            ->with($this->equalTo("Select * from user where name='Sam'"))
            ->willReturn($resultMock);

        $greeter = new \user_interactions\Greeter($dbMock, "Sam");

        $result = $greeter->findFavouriteFood();

        $this->assertEquals("I don't know your favourite food." , $result);
    }

    public function testFindFavouriteFood() {
        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->expects($this->once())
            ->method('fetch_array')
            ->with()
            ->willReturn(["id" => 1, "name" => "Tina", "favourite_food" => "Cookies"]);

        $dbMock = $this->createMock(mysqli::class);
        $dbMock->expects($this->once())
            ->method('query')
            ->with($this->equalTo("Select * from user where name='Tina'"))
            ->willReturn($resultMock);

        $greeter = new \user_interactions\Greeter($dbMock, "Tina");

        $result = $greeter->findFavouriteFood();

        $this->assertEquals("Your favourite food is Cookies." , $result);
    }

    public function testFindFavouriteFoodForTwoPeople() {
        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->expects($this->exactly(2))
            ->method('fetch_array')
            ->with()
            ->willReturnOnConsecutiveCalls(
                ["id" => 1, "name" => "Tina", "favourite_food" => "Cookies"],
                ["id" => 2, "name" => "Phil", "favourite_food" => "Ice creams"]
            );

        $dbMock = $this->createMock(mysqli::class);
        $dbMock->expects($this->exactly(2))
            ->method('query')
            ->withConsecutive(
                [$this->equalTo("Select * from user where name='Tina'")],
                [$this->equalTo("Select * from user where name='Phil'")]
            )
            ->willReturnOnConsecutiveCalls($resultMock, $resultMock);

        $greeterTina = new \user_interactions\Greeter($dbMock, "Tina");
        $greeterPhil = new \user_interactions\Greeter($dbMock, "Phil");

        $resultTina = $greeterTina->findFavouriteFood();
        $this->assertEquals("Your favourite food is Cookies." , $resultTina);

        $resultPhil = $greeterPhil->findFavouriteFood();
        $this->assertEquals("Your favourite food is Ice creams." , $resultPhil);
    }
}

?>