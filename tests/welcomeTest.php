<?php

class welcomeTest extends \PHPUnit\Framework\TestCase
{
    public function testHelloWorld()
    {
        $this->expectOutputString('Hello World!');

        include_once 'www/HelloWorld.php';
    }

    /**
     * @backupGlobals
     */
    public function testHelloSylvie()
    {
        global $_GET;
        $_GET = [];
        $_GET['name'] = "Sylvie";

        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->expects($this->once())
            ->method('fetch_array')
            ->with()
            ->willReturn(false);

        $dbMock = $this->createMock(mysqli::class);
        $dbMock->expects($this->once())
            ->method('query')
            ->with($this->equalTo("Select * from user where name='Sylvie'"))
            ->willReturn($resultMock);

        global $LINK;
        $LINK = $dbMock;



        $this->expectOutputRegex("/^Hello Sylvie !<br \/>I don\'t know your favourite food./");

        include_once 'www/welcome.php';
    }


    public function testHelloSylviewithrealdb()
    {
        global $_GET;
        $_GET = [];
        $_GET['name'] = "Sylvie";
        

        $this->expectOutputRegex("/^Hello Sylvie !<br \/>Your favourite food is Entrecôtes./");

        include_once 'www/welcome.php';
    }
}

?>