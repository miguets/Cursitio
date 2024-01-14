<?php
require_once '../../config.php';
require_once BASE_PATH . '/php/conexion.php';
session_start();
if (isset($_SESSION["user"])){
    //datos del usuario
    $user = $_SESSION["user"];
    $tipo_usuario = $_SESSION["tipo_usuario"];
    $cursoId = 3;
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
    if($usertipo == 2){
        echo "<script>alert(`Usted como maestro no puede realizar un examen`); window.location=`../esp.php`</script>";
    }
}
else{
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursitio</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/me.css">
    <style>
        h3{
            margin-top: 30px;
            color: white;
            text-align: center;
            font-size: 2rem;
            font-weight: 1000;
            
        }
        
        input{
            width: 3rem;
            height: 1rem;
            margin: 5px;
            
        }
        label{
            font-size: 1.5rem;
            color: white;
            
            margin: 5px;
        }
        span{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-send{
            text-align: center;
            width: 100px;
            height: 50px;
        }
        .footer{
            position: relative;
            color: white;
        }

    </style>
</head>
<body>
    <header>
        <figure class="logo">
            <a href="../../index.php"><img src="../../sources/logo.png" alt="Logo de la marca"></a>
            <figcaption>CurSitio</figcaption>
        </figure>
        <nav>
            <ul class="nav-menu">
                <li><a href="../../index.php">Inicio</a></li>
                <li><a href="../../public/conocenos.php">Conocenos</a></li>
                <li><a href="../../public/mapacurricular.php">Mapa Curricular</a></li>
                <li><a href="">Facebook</a></li>
                <li>
                <?php
                if (!isset($_SESSION["user"])){
                    echo '<a href="../../public/login.php"><button class="btn">Ingresar</button></a>';
                }
                else{
                    echo '<a href="../../php/logout.php"><button class="btn">Cerrar Sesion</button></a>';
                }
                ?>
                </li>
                
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <article>
                <form action="evaluar_examen.php" method="post">
                    <h3>Pregunta 1: Pregunta?</h3>
                    <input type="radio" name="pregunta[1]" id="pregunta1.1" value="1"> <label for="pregunta1.1">Correcta</label><br>
                    <input type="radio" name="pregunta[1]" id="pregunta1.2" value="2"> <label for="pregunta1.2">Incorrecta</label><br>
                    <input type="radio" name="pregunta[1]" id="pregunta1.3" value="3"> <label for="pregunta1.3">Incorrecta</label><br>
                    <input type="radio" name="pregunta[1]" id="pregunta1.4" value="4"> <label for="pregunta1.4">Incorrecta</label><br>

                    <h3>Pregunta 2: Pregunta?</h3>
                    <input type="radio" name="pregunta[2]" id="pregunta2.1" value="1"> <label for="pregunta2.1">Incorrecta</label> <br>
                    <input type="radio" name="pregunta[2]" id="pregunta2.2" value="2"> <label for="pregunta2.2">Correcta</label><br>
                    <input type="radio" name="pregunta[2]" id="pregunta2.3" value="3"> <label for="pregunta2.3">Incorrecta</label><br>
                    <input type="radio" name="pregunta[2]" id="pregunta2.4" value="4"> <label for="pregunta2.4">Incorrecta</label><br>

                    <h3>Pregunta 3: Pregunta?</h3>
                    <input type="radio" name="pregunta[3]" id="pregunta3.1" value="1"> <label for="pregunta3.1">Incorrecta</label><br>
                    <input type="radio" name="pregunta[3]" id="pregunta3.2" value="2"> <label for="pregunta3.2">Incorrecta</label><br>
                    <input type="radio" name="pregunta[3]" id="pregunta3.3" value="3"> <label for="pregunta3.3">Correcta</label><br>
                    <input type="radio" name="pregunta[3]" id="pregunta3.4" value="4"> <label for="pregunta3.4">Incorrecta</label><br>

                    <h3>Pregunta 4: Pregunta?</h3>
                    <input type="radio" name="pregunta[4]" id="pregunta4.1" value="1"> <label for="pregunta4.1">Incorrecta</label><br>
                    <input type="radio" name="pregunta[4]" id="pregunta4.2" value="2"> <label for="pregunta4.2">Incorrecta</label><br>
                    <input type="radio" name="pregunta[4]" id="pregunta4.3" value="3"> <label for="pregunta4.3">Incorrecta</label><br>
                    <input type="radio" name="pregunta[4]" id="pregunta4.4" value="4"> <label for="pregunta4.4">Correcta</label><br>

                    <h3>Pregunta 5: Pregunta?</h3>
                    <input type="radio" name="pregunta[5]" id="pregunta5.1" value="1"> <label for="pregunta5.1">Correcta</label><br>
                    <input type="radio" name="pregunta[5]" id="pregunta5.2" value="2"> <label for="pregunta5.2">Incorrecta</label><br>
                    <input type="radio" name="pregunta[5]" id="pregunta5.3" value="3"> <label for="pregunta5.3">Incorrecta</label><br>
                    <input type="radio" name="pregunta[5]" id="pregunta5.4" value="4"> <label for="pregunta5.4">Incorrecta</label><br>

                    <h3>Pregunta 6: Pregunta?</h3>
                    <input type="radio" name="pregunta[6]" id="pregunta6.1" value="1"> <label for="pregunta6.1">Incorrecta</label><br>
                    <input type="radio" name="pregunta[6]" id="pregunta6.2" value="2"> <label for="pregunta6.2">Correcta</label><br>
                    <input type="radio" name="pregunta[6]" id="pregunta6.3" value="3"> <label for="pregunta6.3">Incorrecta</label><br>
                    <input type="radio" name="pregunta[6]" id="pregunta6.4" value="4"> <label for="pregunta6.4">Incorrecta</label><br>

                    <h3>Pregunta 7: Pregunta?</h3>
                    <input type="radio" name="pregunta[7]" id="pregunta7.1" value="1"> <label for="pregunta7.1">Incorrecta</label><br>
                    <input type="radio" name="pregunta[7]" id="pregunta7.2" value="2"> <label for="pregunta7.2">Incorrecta</label><br>
                    <input type="radio" name="pregunta[7]" id="pregunta7.3" value="3"> <label for="pregunta7.3">Correcta</label><br>
                    <input type="radio" name="pregunta[7]" id="pregunta7.4" value="4"> <label for="pregunta7.4">Incorrecta</label><br>

                    <h3>Pregunta 8: Pregunta?</h3>
                    <input type="radio" name="pregunta[8]" id="pregunta8.1" value="1"> <label for="pregunta8.1">Incorrecta</label><br>
                    <input type="radio" name="pregunta[8]" id="pregunta8.2" value="2"> <label for="pregunta8.2">Incorrecta</label><br>
                    <input type="radio" name="pregunta[8]" id="pregunta8.3" value="3"> <label for="pregunta8.3">Incorrecta</label><br>
                    <input type="radio" name="pregunta[8]" id="pregunta8.4" value="4"> <label for="pregunta8.4">Correcta</label><br>

                    <h3>Pregunta 9: Pregunta?</h3>
                    <input type="radio" name="pregunta[9]" id="pregunta9.1" value="1"> <label for="pregunta9.1">Correcta</label><br>
                    <input type="radio" name="pregunta[9]" id="pregunta9.2" value="2"> <label for="pregunta9.2">Incorrecta</label><br>
                    <input type="radio" name="pregunta[9]" id="pregunta9.3" value="3"> <label for="pregunta9.3">Incorrecta</label><br>
                    <input type="radio" name="pregunta[9]" id="pregunta9.4" value="4"> <label for="pregunta9.4">Incorrecta</label><br>

                    <h3>Pregunta 10: Pregunta?</h3>
                    <input type="radio" name="pregunta[10]" id="pregunta10.1" value="1"> <label for="pregunta10.1">Incorrecta</label><br>
                    <input type="radio" name="pregunta[10]" id="pregunta10.2" value="2"> <label for="pregunta10.2">Correcta</label><br>
                    <input type="radio" name="pregunta[10]" id="pregunta10.3" value="3"> <label for="pregunta10.3">Incorrecta</label><br>
                    <input type="radio" name="pregunta[10]" id="pregunta10.4" value="4"> <label for="pregunta10.4">Incorrecta</label><br>
                    <!-- Campos ocultos para cursoId y userid -->
                    <input type="hidden" name="cursoId" value="<?php echo htmlspecialchars($cursoId); ?>">
                    <input type="hidden" name="userid" value="<?php echo htmlspecialchars($userid); ?>">
                    <span><input type="submit" class="btn-send" value="Enviar"></span>
                </form>
            </article>
        </section>
        <aside>
        </aside>
    </main>
    <footer class="footer">
        <p>Derechos de autor © 2023 CurSitio</p>
    </footer>
</body>
</html>