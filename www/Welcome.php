<?php

include_once 'src/DatabaseConnection.php';
include_once 'src/Greeter.php';

if (isset ($_GET ['name'])) {
    $name = $_GET ['name'];
    $greeter = new \user_interactions\Greeter($LINK, $name);
    printf($greeter->sayHello() . '<br />');
    printf($greeter->findFavouriteFood());
} else {
    printf("Hello world!");
}

?>