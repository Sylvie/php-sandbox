<?php

namespace user_interactions;

require_once "src/DatabaseConnection.php";


class Greeter
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayHello() {
        return "Hello " . $this->name . " !";
    }

    public function findFavouriteFood() {
        $result = mysqli_query($LINK, "Select * from user where name=$this->name") or die('Error while fetching data.');

        return $result;

        return "I don't know your favourite food.";
    }

    private string $name;
}

?>
