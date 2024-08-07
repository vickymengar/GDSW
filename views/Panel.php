<?php
// Iniciar sesión (si aún no está iniciada)
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["ID_Usuario"])) {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    $login_url = 'index.php?c=Login&a=index';
    // Redirigir al usuario al panel principal
    header("Location: $login_url");
    exit;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/isoazul.png">
    <title>AIVI</title>

</head>

<body>
    <div class="head">
        <div class="Logo">
            <a href="#"><img src="img/logoblanco.png" alt="Logo de la empresa" class="logo-img"></a>
        </div>
        <nav class="navbar">
            <a href="index.php?c=Panel&a=index">Inicio</a>
            <a href="index.php?c=Pacientes&a=index">Pacientes</a>
            <a href="index.php?c=Citas&a=index">Citas</a>
            <a href="index.php?c=Receta&a=index">Recetas</a>
            <a href="index.php?c=Chatbot&a=index">ChatBot</a>
            <a href="index.php?c=Logout&a=index">Cerrar sesión</a>
        </nav>
    </div>

    <header class="content header">
        <h2 class="title3">Mejora Tu Salud Con Aivi</h2>
        <p>¡El Tratamiento Es Un Estilo De Vida Saludable!</p>
        <a href="index.php?c=Citas&a=index" class="btn">Visualizar Citas</a>
        <div class="custom-scroll-down-arrow"><a href="#"><i class="fas fa-chevron-down" style="color: #192655; font-size: 24px;"></i></a></div>
    </header>

    <section class="content sau" id="nos-respaldan">
        <h2 class="title title-bar">Nos Respaldan</h2>
        <p>
            En Aivi, nos enorgullece contar con un sólido respaldo proveniente
            de diversos ámbitos académicos. Nuestra trayectoria está fundamentada
            por una base sólida de estudios universitarios, respaldados por
            el rigor académico y la excelencia educativa, ofreciendo el mejor servicio
            a nuestros clientes
        </p>

        <div class="box-container3">
            <div class="box">
                <img src="img/escudo.png" alt="">
                <h3>UATX</h3>
                <p> Institución reconocida por su excelencia académica
                    y su compromiso con la formación integral de sus estudiantes.
                </p>
            </div>

            <div class="box">
                <img src="img/lic.jpg" alt="">
                <h3>Lic. Naturopatia</h3>
                <p> Programa académico reconocido por formar profesionales
                    eficaces en el campo de la medicina natural y holistica.
                </p>
            </div>

            <div class="box">
                <img src="img/centro.jpg" alt="">
                <h3>Cen. Biomagnetismo</h3>
                <p>Enfoque medico basado en
                    el uso de imanes para equilibrar la energía del cuerpo.
                </p>
            </div>
        </div>
    </section>


    <section class="content about">
        <h2 class="title title-bar">Nosotros</h2>
        <p>
            Nuestro equipo está conformado por profesionales altamente capacitados y comprometidos, cuyos conocimientos
            están respaldados por la culminación de una licenciatura en Naturopatia. Esta formación académica especializada
            nos otorga las herramientas necesarias para ofrecer soluciones efectivas y respuestas confiables a las necesidades
            de nuestros clientes.
        </p>
        <div class="box-container2">
            <div class="box">
                <img src="img/escudo.png" alt="">
                <h3>Dr. Víctor Cervantes Gracia</h3>
                <p>Cedu. Prof.13645506</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>


            <div class="box">
                <img src="img/escudo.png" alt="">
                <h3>Dr. Martha Aida Hernández Larios</h3>
                <p>Cedu. Prof.1732424</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="js/prueba.js"></script>

</body>
<footer class="footer">
    <img src="img/logoblanco.png" alt="" class="logof">
    <div class="social-icons-container">
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
    </div>
    <ul class="footer-menu-container">
        <li class="menu-item">Legal</li>
        <li class="menu-item">cookies</li>
        <li class="menu-item">Privacidad</li>
        <li class="menu-item">Inicio</li>
    </ul>
    <span class="copyright">&copy;2024, Uptx, Derechos reservados.</span>
</footer>

</html>