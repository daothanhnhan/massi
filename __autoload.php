<?php
// function __autoload($class_name) 
// {
//     $file = dirname(__FILE__).DIR_FUNCTIONS.$class_name.'.php';
//     if(file_exists($file)) {
//         require_once $file;
//     }
// }

spl_autoload_register(function($class_name){

    $file = dirname(__FILE__).DIR_FUNCTIONS.$class_name.'.php';
    // Load or Require the class File
    if( is_file($file) ){
        require_once($file);
    }else{
        die("$file file does not exists.");
    }
})
?>