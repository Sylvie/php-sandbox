<?php

namespace user_interactions;

class Greeter
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayHello() {
        return "Hello " . $this->name . " !";
    }

    private string $name;
}

?>
