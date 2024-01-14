<?php
require_once '../../config.php';
require_once BASE_PATH . '/php/conexion.php';
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nickname = ? OR email = ?");
$stmt->bind_param("ss", $user, $user);
$stmt->execute();
$resultadostmt = $stmt->get_result();
$datosUsuario = $resultadostmt->fetch_assoc();
$userid = $datosUsuario["id"];
$userNickname = $datosUsuario["nickname"];
$userNombres = $datosUsuario["nombres"];
$userApellidos = $datosUsuario["apellidos"];
$userEmail = $datosUsuario["email"];
$usertipo = $datosUsuario["tipo_usuario"];
$stmt->close();
?>