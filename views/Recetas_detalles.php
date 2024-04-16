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
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="icon" href="img/isoazul.png">
    <title>Recetas</title>
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
            <li><a href="./Receta.php">Citas</a></li>
            <li><a href="./Registroreceta.php">Registro</a></li>
        </ul>
    </div>
    </div>

    <div class="container">
        <header>AIVI</header>

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Datos Del Médico</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nombreMedico">Nombre Del Médico</label>
                            <select id="nombreMedico" required>
                                <option value="">Seleccione un Médico</option>
                                <option></option>
                                <option></option>
                               
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="cedulaProfesional">Cedula Profesional</label>
                            <select id="cedulaProfesional" required>
                                <option value="">Cédula Profesional</option>
                                <option></option>
                                <option></option>
                                <!-- Agrega más opciones según necesites -->
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Fecha</label>
                            <input type="date" placeholder="Ingrese Los Datos" required>
                        </div>

                    </div>
                </div>

                <div class="details ID"> <!-- Datos paciente -->
                    <span class="title">Datos Del Paciente</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nombrePaciente">Nombre Del Paciente</label>
                            <select id="nombrePaciente" required>
                                <option value="">Seleccione un Paciente</option>
                                <option></option>
                                <option></option>
                        
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="edadPaciente">Edad</label>
                            <select id="edadPaciente" required>
                                <option value="">Seleccione la Edad</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <!-- Agrega más opciones según necesites -->
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Peso</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>Temperatura</label>
                            <input type="text" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>Talla</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>T/A</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>SO2</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                        <div class="input-field">
                            <label>Dx</label>
                            <input type="number" placeholder="Ingrese Los Datos" required>
                        </div>

                    </div>
                </div>

                <div class="details diagnostico-form"> <!-- Datos de diagnóstico -->
                    <span class="title">Receta Medica</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Receta</label>
                            <textarea placeholder="Ingrese la receta médica" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="boton efecto3" onclick="actualizarDatos()">Actualizar</button>
            <button type="button" class="boton efecto3" onclick="cancelar()">Cancelar</button>
        </form>
    </div>

    <script src="../js/recetas.js"></script>
    <script src="../js/recetas_detalles.js"></script>

    <footer class="footer">
        <img src="/img/logoblanco.png" alt="" class="logof">
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
</body>
</html>
