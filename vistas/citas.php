<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/citas.css">
    <link rel="icon" href="../img/isoazul.png">
    <title>Citas</title>
    
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
            <h3>Citas</h3>
        </div>

        <div class="box" onclick="mostrarContenido(2)">
            <img src="../img/isoblanco.png" alt="">
            <h3>Añadir cita</h3>
        </div>
    </div>

    <div class="contenido" id="contenido-1">
        <div class="container">
            <div id="tabla-container"></div>
        </div>
    </div>

    <div class="contenido" id="contenido-2">
        <div class="container">
        <form action="#">
    <div class="form first">
        <!-- Datos paciente -->
        <div class="details ID">
            <span class="title">Datos Del Paciente</span>
            <div class="fields">
                <div class="input-field">
                    <label>ID Cita</label>
                    <input type="text" placeholder="Ingrese el ID de la Cita" required>
                </div>
                <div class="input-field">
                    <label>ID Paciente</label>
                    <input type="text" placeholder="Ingrese el ID del Paciente" required>
                </div>
                <div class="input-field">
                    <label>ID Medico</label>
                    <input type="text" placeholder="Ingrese el ID del Médico" required>
                </div>
                <div class="input-field">
                    <label>Fecha</label>
                    <input type="date" placeholder="Ingrese la Fecha" required>
                </div>
                <div class="input-field">
                    <label>Hora</label>
                    <input type="time" placeholder="Ingrese la Hora" required>
                </div>
                <div class="input-field">
                    <label>Motivo</label>
                    <input type="text" placeholder="Ingrese el Motivo de la Cita" required>
                </div>
                <div class="input-field">
                    <label>Estado</label>
                    <input type="text" placeholder="Ingrese el Estado de la Cita" required>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="boton efecto3">
        Guardar Cita
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

    <script src="../js/citas.js"></script>
</body>
</html>