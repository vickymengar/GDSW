<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pacientes.css">
    <link rel="icon" href="../img/isoazul.png">
    <title>Pacientes</title>
    
</head>
<body>
    <div class="head">
        <div class="Logo">
            <a href="#"><img src="../img/logoblanco.png" alt="Logo de la empresa" class="logo-img"></a>
        </div>
        <nav class="navbar">
            <a href="./index.php">Inicio</a>
            <a href="./pacientes.php">Pacientes</a>
            <a href="./citas.php">Citas</a>
            <a href="./receta.php">Recetas</a>
            <!--<a href="./historial.php">Historiales</a>-->
            <a href="#">Cerrar sesión</a>
        </nav>
    </div>

    <div class="box-container2" id="box-container">
        <div class="box" onclick="mostrarContenido(1)">
            <img src="../img/isoblanco.png" alt="">
            <h3>Pacientes</h3>
        </div>

        <div class="box" onclick="mostrarContenido(2)">
            <img src="../img/isoblanco.png" alt="">
            <h3>Añadir paciente</h3>
        </div>
    </div>

    <div class="contenido" id="contenido-1">
        <div class="container">
            <input type="text" id="searchInput" placeholder="Buscar...">
            <div id="tabla-container"></div>
        </div>
    </div>

    <div class="contenido" id="contenido-2">
        <div class="container">
        <header>AIVI</header>
        <form action="#">
            <div class="form first">
                <div class="details ID"> <!-- Datos paciente -->
                    <span class="title">Datos Del Paciente</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nombre</label>
                            <input type="text" placeholder="Ingrese Los Datos" required>
                        </div>
                        <div class="input-field">
                            <label>Apellido paterno</label>
                            <input type="text" placeholder="Ingrese Los Datos" required>
                        </div>
                        <div class="input-field">
                            <label>Apellido materno</label>
                            <input type="text" placeholder="Ingrese Los Datos" required>
                        </div>
                        <div class="input-field">
                            <label>Edad</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>
                    </div>
                </div>
                <div class="details ID"> <!-- Datos paciente -->
                    <span class="title">Doctor a cargo</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>ID Medico</label>
                            <input type="text" placeholder="Ingrese Los Datos" required>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="boton efecto3">
                Guardar Paciente
            </a>
        </form>
        </div>
    </div>


    <footer class="footer">
        <img src="..//img/logoblanco.png" alt="" class="logof">
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

    <script src="../js/pacientes.js"></script>
</body>
</html>