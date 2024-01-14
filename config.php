<?php 
//este lo utilizamos para configurar los directorios
define('ENVIRONMENT', 'development'); 

if (ENVIRONMENT === 'development') {
    //local 
    define('BASE_PATH', 'C:/xampp/htdocs');

    //webhost
    // define('BASE_PATH', dirname(__FILE__));
} 

?>