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
    <link rel="stylesheet" href="css/style5.css">
    <link rel="icon" href="img/isoazul.png">
    <title>Pacientes</title>
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
            <li><a href="index.php?c=Pacientes&a=index">Pacientes</a></li>
            <li><a href="index.php?c=RegistroP&a=index">Registro</a></li>
        </ul>
    </div>

    <div class="container">
        <!-- Tabla de pacientes existentes -->
        <table id="tabla-pacientes" class="styled-table">
            <!-- Encabezado de la tabla -->
            <thead>
                <tr>
                    <th>ID Paciente</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Edad</th>
                    <th>Medico Asignado</th>
                    <th>Acciones</th> <!-- Nueva columna para botones de acciones -->
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody id="tbody-pacientes">
                <!-- Aquí se agregarán dinámicamente las filas de la tabla -->
                <?php
                foreach ($data['pacientes'] as $dato) {
                    echo "<tr>";
                    echo "<td>" . $dato['ID_Paciente'] . "</td>";
                    echo "<td>" . $dato['Nombre'] . "</td>";
                    echo "<td>" . $dato['ApellidoPaterno'] . "</td>";
                    echo "<td>" . $dato['ApellidoMaterno'] . "</td>";
                    echo "<td>" . $dato['Edad'] . "</td>";
                    echo "<td>" . $dato['NombreCompletoMedico'] . "</td>"; // Mostrar el nombre completo del médico
                    echo "<td>";
                    echo "<button onclick='editarPaciente(" . $dato['ID_Paciente'] . ")'>Editar</button>";
                    echo "<button onclick='eliminarPaciente(" . $dato['ID_Paciente'] . ")'>Eliminar</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
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
