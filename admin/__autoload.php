<?php
function __autoload($class_name) 
{
    
    // # Usually I would just concatenate directly to $file variable below
    // # this is just for easy viewing on Stack Overflow)
    //     $ds = DIRECTORY_SEPARATOR;
    //     $dir = __DIR__;

    // // replace namespace separator with directory separator (prolly not required)
    //     $class_name = str_replace('\\', $ds, $class_name);

    // // get full name of file containing the required class
    //     $file = "{$dir}{$ds}{$class_name}.php";

    // // get file if it is readable
    //     if (is_readable($file)) include_once $file;


    $file = $class_name . '.php';
    if(file_exists($file)) {
        require_once $file;
    }
}
?>