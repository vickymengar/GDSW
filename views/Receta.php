<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style5.css">
    <link rel="icon" href="img/isoazul.png">
    <title>Recetas</title>
</head>
<body>
    <div class="head">
        <div class="Logo">
            <a href="#"><img src="img/logoblanco.png" alt="Logo de la empresa" class="logo-img"></a>
        </div>
        <nav class="navbar">
            <a href="./Index.php">Inicio</a>
            <a href="./Pacientes1.php">Pacientes</a>
            <a href="./Citas.php">Citas</a>
            <a href="./Receta.php">Recetas</a>
            <a href="#">Cerrar sesión</a>
        </nav>
    </div>
    <div class="bar2">
        <ul>
            <li><a href="./Receta.php">Citas</a></li>
            <li><a href="./Registroreceta.php">Registro</a></li>
        </ul>
    </div>

    <div class="container">
        <!-- Tabla de pacientes existentes -->
        <table id="tabla-pacientes" class="styled-table">
            <!-- Encabezado de la tabla -->
            <thead>
                <tr>
                    <th>ID Receta</th>
                    <th>ID Médico</th>
                    <th>ID Paciente</th>
                    <th>Fecha de Creación</th>
                    <th>Nombre del Paciente</th>
                    <th>Apellido Paterno del Paciente</th>
                    <th>Apellido Materno del Paciente</th>
                    <th>Edad</th>
                    <th>Peso</th>
                    <th>Temperatura</th>
                    <th>Talla</th>
                    <th>Tensión Arterial</th>
                    <th>SO2</th>
                    <th>Diagnóstico</th>
                    <th>Receta</th>
                    <th>Acciones</th> <!-- Nueva columna para botones de acciones -->
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody id="tbody-pacientes">
                <!-- Aquí se agregarán dinámicamente las filas de la tabla -->
            </tbody>
        </table>

    </div>

    <script src="js/citas.js"></script>
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
