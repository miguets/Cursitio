<?php
require_once '../../config.php';
require_once BASE_PATH . '/php/conexion.php';
session_start();
$user = $_SESSION["user"];
$tipo_usuario = $_SESSION["tipo_usuario"];
$cursoId = isset($_POST['cursoId']) ? intval($_POST['cursoId']) : 0;
$userid = isset($_POST['userid']) ? intval($_POST['userid']) : 0;
// Respuestas correctas
$respuestas_correctas = [
    1 => 1, 
    2 => 2, 
    3 => 3,
    4 => 4,
    5 => 1,
    6 => 2,
    7 => 3,
    8 => 4,
    9 => 1,
    10 => 2
];
// Contar aciertos
$aciertos = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['pregunta'] as $numero_pregunta => $opcion_elegida) {
        if (isset($respuestas_correctas[$numero_pregunta]) && $respuestas_correctas[$numero_pregunta] == $opcion_elegida) {
            $aciertos++;
        }
    }
    $calificacion = $aciertos * 10;
    echo $aciertos;
    $sql = "UPDATE calificaciones_materias SET calexm = ? WHERE estudiante_id = ? AND curso_id = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("iii", $calificacion, $userid, $cursoId);

        if ($stmt->execute()) {
            // echo "Calificacion: $calificacion, Usuario: $userid, Curso: $cursoId<br>";
            header("Location: /index.php");
            exit; 
        } else {
            echo "Error al actualizar la calificación: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
    $stmt->close();
}
?>