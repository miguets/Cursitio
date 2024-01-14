<?php
require_once '../config.php';
require_once BASE_PATH . '/php/conexion.php';
require_once BASE_PATH . '/php/register.php';
session_start();
if (isset($_SESSION["user"])){
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursitio</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/loginstyle.css">
    <style>
        @media (max-width: 800px){
        .login{
            top: 350px;
            height: 650px;
        }
        }
        .ad{
            background: red;
            color: white;
            font-size: 1.5rem;
            width: 100%;
            text-align: center;
        }
    </style>
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
                <li><a href="./mapacurricular.php">Mapa Curricular</a></li>
                <li><a href="">Facebook</a></li>
                <li><a href="./login.php"><button class="btn">Ingresar</button></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <article>
                <div class="login">
                    <h1>Registrarse</h1>
                    <form method="post">
                        <div class="login_field">
                            <input type="text" name="user" required>
                            <span></span>
                            <label>Usuario</label>
                        </div>
                        <div class="login_field">
                            <input type="text" name="name">
                            <span></span>
                            <label>Nombres</label>
                        </div>
                        <div class="login_field">
                            <input type="text" name="apellidos" required>
                            <span></span>
                            <label>Apellidos</label>
                        </div>
                        <div class="login_field">
                            <input type="text" name="email" required>
                            <span></span>
                            <label>Correo</label>
                        </div>
                        <div class="login_field">
                            <input type="password" name="password" required>
                            <span></span>
                            <label>Contraseña</label>
                        </div>
                        <div class="login_field">
                            <input type="password" required>
                            <span></span>
                            <label>Repetir Contraseña</label>
                        </div>
                        <input type="submit" name="submit" value="Enviar">
                        <div class="signup_link">
                        </div>
                    </form>
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