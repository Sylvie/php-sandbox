<?php

namespace user_interactions;

class Greeter
{
    public function __construct(\mysqli $mysqli, string $name)
    {
        $this->mysqli = $mysqli;
        $this->name = $name;
    }

    public function sayHello() {
        return "Hello " . $this->name . " !";
    }

    public function findFavouriteFood() {
        $queryResult = $this->mysqli->query("Select * from user where name='" . $this->name . "'") or die('Error while fetching data.');

        $row = $queryResult->fetch_array();

        $result =  "I don't know your favourite food.";
        if (is_array($row)) {
            $favouriteFood = $row['favourite_food'];
            $result = "Your favourite food is " . $favouriteFood . ".";
        }

        return $result;
    }

    private $mysqli;
    private string $name;
}

?>
