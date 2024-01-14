<?php
require_once './config.php';
require_once BASE_PATH . '/php/conexion.php';
session_start();
// $user = $_SESSION["user"];
// $tipo_usuario = $_SESSION["tipo_usuario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursitio</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <figure class="logo">
            <a href="./index.php"><img src="./sources/logo.png" alt="Logo de la marca"></a>
            <figcaption>CurSitio</figcaption>
        </figure>
        <nav>
            <ul class="nav-menu">
                <li><a href="#">Inicio</a></li>
                <li><a href="./public/conocenos.php">Conocenos</a></li>
                <li><a href="./public/mapacurricular.php">Mapa Curricular</a></li>
                <li><a href="">Facebook</a></li>
                <li>
                <?php
                if (!isset($_SESSION["user"])){
                    echo '<a href="./public/login.php"><button class="btn">Ingresar</button></a>';
                }
                else{
                    echo '<a href="./php/logout.php"><button class="btn">Cerrar Sesion</button></a>';
                }
                ?>    
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <article class="cards-home">
                <div class="container-cards">
                    <div class="homecards">
                        <a href="./me/esp.php"><img src="./sources/esphome.jpg" alt=""></a>
                        <h3 class="textcard">Español</h3>
                    </div>
                    <div class="homecards">
                        <a href="./me/programacion.php"><img src="./sources/prohome.jpg" alt=""></a>
                    <h3 class="textcard">Iniciación A La Programación</h3> 
                    </div>
                    <div class="homecards">
                        <a href="./me/hab.php"><img src="./sources/habhome.webp" alt=""></a>
                        <h3 class="textcard">Habilidades De Aprendizaje Y Desarollo Personal</h3>
                    </div>
                    <div class="homecards">
                        <a href="./me/mat.php"><img src="./sources/mathome.jpg" alt=" Curso de Matematicas"></a>
                        <h3 class="textcard">Matematicas</h3>
                    </div>
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