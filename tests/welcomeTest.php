<?php

/**
 * @runTestsInSeparateProcesses
 */
class welcomeTest extends \PHPUnit\Framework\TestCase
{
    public function testWelcomeWithUnknownFavouriteFood()
    {
        global $_GET;
        $_GET = [];
        $_GET['name'] = "Clara";

        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->expects($this->once())
            ->method('fetch_array')
            ->with()
            ->willReturn(false);

        $dbMock = $this->createMock(mysqli::class);
        $dbMock->expects($this->once())
            ->method('query')
            ->with($this->equalTo("Select * from user where name='Clara'"))
            ->willReturn($resultMock);

        global $LINK;
        $LINK = $dbMock;

        $this->expectOutputRegex("/^Hello Clara !<br \/>I don\'t know your favourite food./");

        include_once 'www/welcome.php';
    }
    
    public function testWelcomeWithKnownFavouriteFood()
    {
        global $_GET;
        $_GET = [];
        $_GET['name'] = "Tina";

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

        global $LINK;
        $LINK = $dbMock;

        $this->expectOutputRegex("/^Hello Tina !<br \/>Your favourite food is Cookies./");

        include_once 'www/welcome.php';
    }
}

?>