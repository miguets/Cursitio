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
    <link rel="stylesheet" href="../css/about.css">
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
                <li><a href="#">Conocenos</a></li>
                <li><a href="./mapacurricular.php">Mapa Curricular</a></li>
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
            <h2>Sobre Nosotros</h2>
            <article>
                    <h3>Objetivo:</h3>
                    <p>
                        Nuestro objetivo fundamental es crear una plataforma educativa en línea integral y accesible que atienda las necesidades educativas de los niños en el nivel de primaria. Queremos proporcionar una experiencia de aprendizaje enriquecedora que fomente el crecimiento académico, el desarrollo de habilidades esenciales y el pensamiento crítico.
                        Buscamos empoderar a nuestros estudiantes para que no solo tengan éxito en sus materias de estudio, que incluyen matemáticas, español, ciencias y programación, sino también para que se conviertan en aprendices de por vida, capaces de abrazar los desafíos intelectuales y contribuir de manera significativa a la sociedad.
                        Este objetivo guiará nuestras acciones para brindar una educación en línea de alta calidad que prepare a los niños para afrontar los desafíos que pueden llegar a presentar en un futuro y en un mundo digital en constante evolución.
                    </p>
                    <h3>Mision:</h3>
                    <p>
                        Nuestra misión es ser un faro de conocimiento y apoyo para los niños de primaria en su viaje educativo. Nos comprometemos a proporcionar una plataforma educativa en línea que no solo ofrezca contenido de alta calidad, sino que también inspire y motive a los estudiantes. Nuestra plataforma brinda acceso a cursos interactivos, materiales educativos actualizados y una comunidad de apoyo que fomente el crecimiento integral de los niños. Estamos dedicados a la excelencia en la educación, a la innovación tecnológica y a la promoción de la igualdad de oportunidades para todos los niños, sin importar su ubicación geográfica o su situación económica.
                    </p>
                    <h3>
                        Vision:
                    </h3>
                    <p>
                        Nuestra visión es la de liderar la transformación de la educación en línea para niños de primaria. Buscamos ser reconocidos a nivel mundial como una fuerza impulsora de la excelencia académica y la inspiración en el aprendizaje. Imaginamos un mundo en el que cada niño tenga acceso a una educación de calidad, independientemente de las barreras geográficas y socioeconómicas. Queremos ser catalizadores de una generación de pensadores creativos, resolutivos y comprometidos con un futuro mejor. A través de nuestra plataforma, esperamos preparar a los niños para los desafíos del siglo XXI y equiparlos con las herramientas necesarias para prosperar en un mundo en constante cambio.
                    </p>
            </article>
        </section>
        <aside>
            <figure>
                <img src="../sources/about.avif" alt="imagen demostración">
            </figure>
        </aside>
    </main>
    <footer class="footer">
        <p>Derechos de autor © 2023 CurSitio</p>
    </footer>
</body>
</html>