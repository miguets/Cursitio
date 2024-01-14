<?php
require_once '../../config.php';
require_once BASE_PATH . '/php/conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener valores del formulario
    list($estudiante_id, $curso_id) = explode('-', $_POST['estudiante_id']);
    $calificacion = $_POST['calificacion'];

    // Actualizar calificación en la base de datos
    $sql = "UPDATE calificaciones_materias SET calfinal = ? WHERE estudiante_id = ? AND curso_id = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iii", $calificacion, $estudiante_id, $curso_id);

    if ($stmt->execute()) {
        
        echo "<script>alert(`calificacion actualizada correctamente`); window.location=`./calificaciones.php`</script>";
    } else {
        echo "<script>alert(`No se pudo actualizar la calificacion`);</script>";
        echo "Error al actualizar la calificación: " . $conexion->error;
    }
    $stmt->close();
}
?>