<?php
require_once '../config.php';
require_once BASE_PATH . '/php/conexion.php';
session_start();
session_destroy();
header("location: /index.php");
?>