<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style4.css">
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
            <a href="./Citas.php">Citas</a>
            <a href="./Receta.php">Recetas</a>
            <a href="index.php?c=Logout&a=index">Cerrar sesión</a>
        </nav>
    </div>
    <div class="bar2">
        <ul>
            <li><a href=".index.php?c=Pacientes&a=index">Pacientes</a></li>
            <li><a href="./Registro.php">Registro</a></li>
        </ul>
    </div>

    <div class="container">
        <header>Aivi</header>

        <form id="registroForm">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Datos Del Paciente</span>

                    <div class="fields">

                        <div class="input-field">
                            <label>Nombre</label>
                            <input id="nombre" type="text" placeholder="Ingrese el Nombre del Paciente" required>
                        </div>

                        <div class="input-field">
                            <label>Apellido Paterno</label>
                            <input id="apellidoPaterno" type="text" placeholder="Ingrese el Apellido Paterno" required>
                        </div>

                        <div class="input-field">
                            <label>Apellido Materno</label>
                            <input id="apellidoMaterno" type="text" placeholder="Ingrese el Apellido Materno" required>
                        </div>

                        <div class="input-field">
                            <label>Edad</label>
                            <input id="edad" type="text" placeholder="Ingrese la Edad" required>
                        </div>

                        <div class="input-field">
                            <label for="Medico">Médico a cargo</label>
                            <select id="Medico" name="Medico" class="input-field" required>
                                <option value="" disabled selected>Selecciona un médico</option>
                                    <!-- Opcion desde la base de datos -->
                            </select>
                        </div>

                        <button type="button" class="boton efecto3" onclick="registrarPaciente()">
                            Registrar Paciente
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="js/pacientes.js"></script>
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
