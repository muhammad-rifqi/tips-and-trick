<?php
spl_autoload_register('myClass');

function myClass($classname){
    $path = "classes/";
    $extentions = ".php";
    $fullpath = $path . $classname . $extentions;
    include_once $fullpath ;
}   


