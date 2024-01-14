<?php
function insertarProgresoEstudiante($usuarioId, $conexion) {
    // Obtener todos los cursos
    $sqlCursos = "SELECT id FROM cursos";
    $resultadoCursos = $conexion->query($sqlCursos);

    if ($resultadoCursos->num_rows > 0) {
        while($curso = $resultadoCursos->fetch_assoc()) {
            $cursoId = $curso["id"];

            // Insertar las calificaciones iniciales para el curso
            $insertCalificaciones = "INSERT INTO calificaciones_materias (estudiante_id, curso_id, calfinal, calexm) 
                                     VALUES ($usuarioId, $cursoId, 0, 0)";

            if (!$conexion->query($insertCalificaciones)) {
                echo "Error al insertar calificaciones: " . $conexion->error;
            }

            // Insertar el progreso del estudiante para cada materia del curso
            $sqlMaterias = "SELECT id FROM materias WHERE curso_id = $cursoId";
            $resultadoMaterias = $conexion->query($sqlMaterias);

            if ($resultadoMaterias->num_rows > 0) {
                while($materia = $resultadoMaterias->fetch_assoc()) {
                    $materiaId = $materia["id"];

                    // Insertar el progreso del estudiante para la materia
                    $insertProgreso = "INSERT INTO progreso_estudiante (estudiante_id, curso_id, leccion_actual, estado, calificacion) 
                                       VALUES ($usuarioId, $cursoId, $materiaId, 'por_ver', 0)";

                    if (!$conexion->query($insertProgreso)) {
                        echo "Error al insertar progreso: " . $conexion->error;
                    }
                }
            }
        }
    }
}
if(!empty($_POST['submit'])){
    // Recoger los datos del formulario
    // $nickname = $conn->real_escape_string($_POST['user']);
    $nickname = $_POST['user'];
    $nombres = $_POST['name'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tipo_usuario = 1;
    //comprobacion si existe o no un usuario
    $sqluser = "SELECT nickname FROM usuarios where (nickname = '$nickname' OR email = '$email')";
    $resultadouser = $conexion->query($sqluser);
    $filasuser= $resultadouser->num_rows;
    if($filasuser>0){
        echo"<script>alert(`el usuario ya existe`); window.location=`register.php`</script>";
    }
    else{
        $stmt = $conexion->prepare("INSERT INTO usuarios (nickname, nombres, apellidos, email, password, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $nickname, $nombres, $apellidos, $email, $password, $tipo_usuario);
        if ($stmt->execute()) {
            $UsuarioId = $stmt->insert_id;
            insertarProgresoEstudiante($UsuarioId, $conexion);
            header("Location: ../index.php");
        } else {
            echo"<script>alert(`el usuario no pudo ser registrado`); window.location=`./register.php`</script>";
        }
    }
    $stmt->close();
    $resultadouser->close();
}
?>