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
    <link rel="stylesheet" href="css/stylecitas.css">
    <link rel="icon" href="img/isoazul.png">
    <title>Citas</title>
    
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
            <a href="index.php?c=Logout&a=index">Cerrar sesión</a>
        </nav>
    </div>
    <div class="bar2">
        <ul>
            <li><a href="index.php?c=Pacientes&a=index">Pacientes</a></li>
            <li><a href="index.php?c=RegistroP&a=index">Registro</a></li>
        </ul>
    </div>

    <div class="container">
        <header>Aivi</header>
        <form id="registroForm" action="index.php?c=RegistroC&a=registrarC" method="post">
    <div class="form first">
        <div class="details personal">
            <span class="title">Datos De La Cita</span>

            <div class="fields">
                <div class="input-field">
                    <label>ID Paciente</label>
                    <select id="idPaciente" name="idPaciente"required>
                        <option value="" disabled selected>Selecciona un paciente</option>
                        
                    </select>
                </div>

                <div class="input-field">
                    <label>Nombre Paciente</label>
                    <input id="nombrepaciente" name="nombrePaciente" type="text" placeholder="Nombre del paciente" required readonly>
                </div>

                <div class="input-field">
                    <label for="idMedico">Nombre Médico</label>
                    <select id="idMedico" name="idMedico"required>
                        <option value="" disabled selected>Selecciona un médico</option>
                       
                    </select>
                </div>

                <div class="input-field">
                    <label>Fecha</label>
                    <input id="fecha" name="fecha" type="date" required>
                </div>

                <div class="input-field">
                    <label>Hora</label>
                    <input id="hora" name="hora" type="time" required>
                </div>

                <div class="input-field">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <option value="" disabled selected>Selecciona un estado</option>
                       
                    </select>
                </div>

                <div class="input-field">
                    <label for="motivo">Motivo</label>
                    <textarea id="motivo" name="motivo" placeholder="Ingrese el motivo" rows="5" required></textarea>
                </div>

                <button type="button" class="boton efecto3" onclick="actualizarDatos()">Actualizar</button>
                <button type="button" class="boton efecto3" onclick="cancelar()">Cancelar</button>
            </div>
        </div>
    </div>
</form>
    </div>

    <script src="js/citas.js"></script>
    <script src="js/citas_detalles.js"></script>
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
