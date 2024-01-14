<?php 
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

if($tipo_usuario == 1){
//sentencias
$queryCompletadas = "SELECT COUNT(*) AS completadas FROM progreso_estudiante WHERE curso_id = $cursoId AND estudiante_id = $userid AND estado = 1";
//consultas
$resultadoCompletadas = $conexion->query($queryCompletadas);
$rowCompletadas = $resultadoCompletadas->fetch_assoc();
//vatiable del total
$leccionesCompletadas = $rowCompletadas['completadas'];
// Calcular el porcentaje
$porcentajeProgreso = (3 > 0) ? ($leccionesCompletadas / 3) * 100 : 0;
$progreso = round($porcentajeProgreso); 
//estado
$estadoll = $conexion->prepare("SELECT m.titulo, pe.estado FROM materias m INNER JOIN progreso_estudiante pe ON m.id = pe.leccion_actual WHERE pe.estudiante_id = ? AND m.curso_id = ? ORDER BY m.id");
$estadoll->bind_param("ii", $userid, $cursoId);
$estadoll->execute();
$resultadoel = $estadoll->get_result();
// Variables para almacenar el estado de cada lección
$filasel = $resultadoel->fetch_all(MYSQLI_ASSOC);    
// Asignar los estados a variables específicas
$estadoLeccion1 = $filasel[0]["estado"];
$estadoLeccion2 = $filasel[1]["estado"];
$estadoLeccion3 = $filasel[2]["estado"];
//calificaciones 
$calstmt = $conexion->prepare("SELECT calfinal, calexm FROM calificaciones_materias WHERE estudiante_id = ? AND curso_id = ?");
$calstmt->bind_param("ii", $userid, $cursoId);
$calstmt->execute();
$resultadoscal = $calstmt->get_result();
$filacal = $resultadoscal->fetch_assoc();
$calfinal = $filacal["calfinal"];
$calexamen=$filacal["calexm"];
$calstmt->close();
}
else{

}
?>