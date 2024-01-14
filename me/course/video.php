<?php
require_once '../../config.php';
require_once BASE_PATH . '/php/conexion.php';
session_start();
if (isset($_SESSION["user"])){
    //datos del usuario
    $user = $_SESSION["user"];
    $tipo_usuario = $_SESSION["tipo_usuario"];
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
    <link rel="stylesheet" href="..../css/me.css">
    <link rel="stylesheet" href="../../css/vid.css">
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
                <li><a href="#">Facebook</a></li>
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
                <div class="video_content">
                    <video src="" controls></video>
                    <div class="vid_info">
                        <p><span>Titulo</span></p>
                        <a href="#"><button>Siguiente</button></a>
                    </div>
                    <div class="add">
                        <p>Recursos adicionales:</p>
                    </div>
                </div>
                <div class="comments">
                    a
                </div>
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