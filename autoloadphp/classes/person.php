<?php

class person {
    
    public $name;
    public $age;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function getPerson(){
        $person = $this->name . " is " . $this->age . " years old ";
        return $person;
    }

}
