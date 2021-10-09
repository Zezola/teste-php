<?php 

spl_autoload_register('ClassesAutoLoader');

function ClassesAutoLoader($class) {
    $path = "classes/";
    $extension = ".class.php";
    $fullPathName = $path . $class . $extension;

    include_once $fullPathName;
}    


?>