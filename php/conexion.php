<?php
require_once BASE_PATH . '/php/db/configuracion.php';
$conexion = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);
$conexion->set_charset("utf8");
if(mysqli_connect_errno()){
    echo "Error no se pudo conectar a la base de datos", mysqli_connect_error();
}
else{
    // echo "conectado";
}
?>