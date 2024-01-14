<?php
require_once '../../config.php';
require_once BASE_PATH . '/php/conexion.php';
session_start();
$user = $_SESSION["user"];
include("./adcal.php");
if (isset($_SESSION["user"])){
    if($usertipo == 2){

    }
    else{
        header("Location: /index.php");
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
    <link rel="stylesheet" href="../../css/cal.css">
    <style>
        .footer {
    position: absolute;
}
form{
        margin: 10px;
        border: 2px solid;
        padding: 10px;
        text-align: center;
    }
    form>p{
        font-size: 1.5rem;
        margin-bottom: 5px;
        margin-top: 5px;
        color: white;
        
    }
    form>select{
        min-width: 150px;
        text-align: center;
        font-size: 0.9rem;
    }
    form>input{
        width: 100px;
        font-size: 1rem;
    }
@media (max-width: 1310px){
    .footer {
        position: relative !important;
    }
    article{
        flex-direction: column;
    }
    form{
        margin: 10px;
        display: flex;
        flex-direction: column;
    }
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
            <h2>Asignar Calificaciones</h2>
            <article>
                <!-- Mostrar lista de estudiantes y calificaciones -->
                <?php 
                $sql = "SELECT u.nombres, u.apellidos, c.materia, cm.calexm, cm.calfinal
                FROM usuarios u
                JOIN calificaciones_materias cm ON u.id = cm.estudiante_id
                JOIN cursos c ON cm.curso_id = c.id
                WHERE u.tipo_usuario = 1";
                $result = $conexion->query($sql);
            
                if ($result->num_rows > 0) {
                    // Mostrar datos en una tabla
                    echo "<table>";
                    echo "<tr><th>Nombre</th><th>Apellido</th><th>Materia</th><th>Calificación Examen</th><th>Calificación Final</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["nombres"]."</td><td>".$row["apellidos"]."</td><td>".$row["materia"]."</td><td>".$row["calexm"]."</td><td>".$row["calfinal"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 resultados";
                }
                echo "<form action='actualizar_calificacion.php' method='post'>";
                echo "<p> Estudiante y Materia:</p>";

                echo "<select name='estudiante_id'>";
                
                // Obtener estudiantes y sus cursos para el select
                $sql = "SELECT u.id, u.nombres, u.apellidos, c.id as curso_id, c.materia 
                        FROM usuarios u 
                        JOIN calificaciones_materias cm ON u.id = cm.estudiante_id 
                        JOIN cursos c ON cm.curso_id = c.id 
                        WHERE u.tipo_usuario = 1";
                $result = $conexion->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["id"]."-".$row["curso_id"]."'>".$row["nombres"]." ".$row["apellidos"]." - ".$row["materia"]."</option>";
                    }
                }
                echo "</select>";
                echo "<p> Calificacion:</p>";
                // Select para la calificación
                echo "<select name='calificacion'>";
                for ($i = 0; $i <= 10; $i++) {
                    echo "<option value='".$i."'>".$i."</option>";
                }
                echo "</select>";
                echo "<p> Enviar:</p>";
                echo "<input type='submit' value='Enviar'>";
                echo "</form>";
                ?>
               
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