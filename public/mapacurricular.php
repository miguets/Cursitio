<?php
require_once '../config.php';
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mc.css">
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
                <li><a href="./conocenos.php">Conocenos</a></li>
                <li><a href="#">Mapa Curricular</a></li>
                <li><a href="">Facebook</a></li>
                <li>
                <?php
                if (!isset($_SESSION["user"])){
                    echo '<a href="./login.php"><button class="btn">Ingresar</button></a>';
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
            <h2>Mapa Curricular</h2>
            <h3>Programa de Estudios - Mapa Curricular:</h3>
            <h3>Área Temática: Educación en línea para Niños de Primaria</h3>
            <article>
                <div class="cap">
                    <img src="../sources/mc.png" alt="mapa curricular">
                </div>
                <div class="pro">
                    <h5>Objetivo General:</h5>
                    <p>
                        "El objetivo principal de nuestra escuela en línea es proporcionar a los niños de primaria una plataforma educativa integral que fomente el amor por el aprendizaje y promueva el desarrollo de habilidades fundamentales en matemáticas, español, ciencias y programación. Nos esforzamos por ofrecer un entorno educativo interactivo y accesible que empodere a los estudiantes para alcanzar su máximo potencial académico."
                    </p>

                    <h5>Perfil de Ingreso:</h5>
                    <p>
                        "El perfil de ingreso ideal para nuestros estudiantes de primaria incluye niños curiosos y motivados que tienen un interés en aprender y explorar las disciplinas académicas clave, como matemáticas, español, ciencias y programación. No se requiere experiencia previa en programación, pero se valora la disposición a participar activamente en las lecciones y actividades."
                    </p>

                    <h5>Perfil de Egreso:</h5>
                    <p>
                        "Al completar nuestros cursos en línea, esperamos que los estudiantes de primaria hayan adquirido un sólido dominio de conceptos fundamentales en matemáticas, español, ciencias y programación. Nuestro perfil de egreso ideal incluye niños que han desarrollado habilidades de pensamiento crítico, resolución de problemas y comunicación. Además, esperamos que los estudiantes hayan cultivado una actitud positiva hacia el aprendizaje continuo y estén preparados para enfrentar con confianza los desafíos académicos futuros."
                    </p>
                </div>                    
            </article>
            <article id="aobj">
                <div class="obj">
                    <h4>Objetivos Educativos:</h4>
                    <h5>Matemáticas:</h5>
                    <p><strong>Objetivo Educativo:</strong> Desarrollar la comprensión y aplicación de conceptos matemáticos básicos, fomentando el razonamiento lógico y la resolución de problemas.</p>
                    <h5>Español:</h5>
                    <p><strong>Objetivo Educativo:</strong> Mejorar las habilidades de lectura y escritura en español, promoviendo la comprensión, expresión y aprecio por la lengua.</p>
                    <h5>Ciencias:</h5>
                    <p><strong>Objetivo Educativo:</strong> Cultivar la curiosidad científica y el pensamiento investigativo, introduciendo conceptos científicos fundamentales de manera práctica y emocionante.</p>
                    <h5>Programación:</h5>
                    <p><strong>Objetivo Educativo:</strong> Introducir a los estudiantes en los principios básicos de la programación, desarrollando habilidades lógicas y creativas a través de la resolución de problemas y la creación de proyectos simples.</p>
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