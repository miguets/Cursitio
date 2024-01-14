<?php 
    if(!empty($_POST['submit'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        // Preparar la consulta para buscar por nickname o correo electrónico
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE (nickname = '$user' OR email = '$user') AND password = '$password'");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Usuario encontrado
            while($row = $result->fetch_assoc()) {
                session_start();
                $_SESSION["user"] = $user;
                $_SESSION["tipo_usuario"] = $row["tipo_usuario"];;
            }
        } else {
            // Usuario no encontrado
            echo "<script>alert(`No se encontró el usuario o la contraseña es incorrecta`); window.location=`./login.php`</script>";            
        }
        $stmt->close();
    }
?>