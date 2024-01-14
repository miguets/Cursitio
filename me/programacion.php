<?php
require_once '../config.php';
require_once BASE_PATH . '/php/conexion.php';
session_start();
if (isset($_SESSION["user"])){
    //datos del usuario
    $user = $_SESSION["user"];
    $tipo_usuario =  $_SESSION["tipo_usuario"];
    $cursoId = 3;
    require_once './adicional.php'; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursitio</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/me.css">
</head>
<body>
    <header>
        <figure class="logo">
            <a href="../index.php"><img src="../sources/logo.png" alt="Logo de la marca"></a>
            <figcaption>CurSitio</figcaption>
        </figure>
        <nav>
            <ul class="nav-menu">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../public/conocenos.php">Conocenos</a></li>
                <li><a href="../public/mapacurricular.php">Mapa Curricular</a></li>
                <li><a href="">Facebook</a></li>
                <li>
                <?php
                if (!isset($_SESSION["user"])){
                    echo '<a href="../public/login.php"><button class="btn">Ingresar</button></a>';
                }
                else{
                    echo '<a href="../php/logout.php"><button class="btn">Cerrar Sesion</button></a>';
                }
                ?>
                </li>
                
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <article>
                <div class="top_signature">
                    <img src="../sources/prohome.jpg" alt="imagen de español">
                    <h3>Iniciación a la Programación:</h3>
                    <div class="user_type">
                        <p>Progreso: <br><span>
                        <?php
                        if (isset($_SESSION["user"])){
                            if($usertipo == 2){
                                echo"0";
                            }
                            else{
                                echo $progreso;
                            }
                        }
                        else{
                            echo "0";
                        }
                        ?>
                        </span>% Completado</p>
                        <p>
                        <?php
                        if (isset($_SESSION["user"])){
                            if($usertipo == 2){
                                echo '<a href="./course/calificaciones.php">Asignar Calificaciones</a>';
                            }
                            else{
                                echo "Calificación: ". $calfinal;
                            }
                        }
                        else{
                            echo " Calificación: 0";
                        }
                        ?>
                        </p>
                        <!-- <p>Calificación/<a href="./course/calificaciones.php">asignar</a> <br><span>0</span></p> -->
                    </div>
                </div>   
                <div class="cmap">
                    <div class="signature">
                        <a href="./course/video.php"><p>Introducción a la Lógica de Programación</p></a>
                        <p><span>
                            <?php
                            if (isset($_SESSION["user"])){
                                if($usertipo == 2){
                                    echo"0";
                                }
                                else{
                                    $temp11 = ($estadoLeccion1 > 0) ? 100 : 0;
                                    echo $temp11;
                                }
                            }
                            else{
                                echo "0";
                            }
                            ?>
                            </span>% Completado</p>
                    </div>
                    <div class="signature">
                        <a href="./course/video.php"><p>Creación de Juegos Interactivos</p></a>
                        <p><span>
                        <?php
                            if (isset($_SESSION["user"])){
                                if($usertipo == 2){
                                    echo"0";
                                }
                                else{
                                    $temp11 = ($estadoLeccion2 > 0) ? 100 : 0;
                                    echo $temp11;
                                }
                            }
                            else{
                                echo "0";
                            }
                            ?>
                        </span>% Completado</p>
                    </div>
                    <div class="signature">
                        <a href="./course/video.php"><p>Desarrollo de Aplicaciones Simples</p></a>
                        <p><span>
                        <?php
                            if (isset($_SESSION["user"])){
                                if($usertipo == 2){
                                    echo"0";
                                }
                                else{
                                    $temp11 = ($estadoLeccion3 > 0) ? 100 : 0;
                                    echo $temp11;
                                }
                            }
                            else{
                                echo "0";
                            }
                            ?>
                        </span>% Completado</p>
                    </div>
                    <div class="signature">
                        <a href="./examenes/progra.php"><p>Examen</p></a>
                        <p>
                        <?php
                            if (isset($_SESSION["user"])){
                                if($usertipo == 2){
                                    echo"No Aplica";
                                }
                                else{
						            $calelx = ($calexamen == 0)? "No Completado": "Completado";
                                    echo $calelx;
                                }
                            }
                            else{
                                echo "No completado";
                            }
                            ?>
                        </p>
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