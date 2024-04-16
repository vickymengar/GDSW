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
    <title>Recetas</title>
    <style>
        .eliminar-container {
            display: flex;
            align-items: center;
            gap: 10px; /* Espacio entre los botones */
        }
        /* Estilos para la tabla */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
        }
        .styled-table th,
        .styled-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .styled-table th {
            background-color: #f2f2f2;
        }
    </style>
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
            <li><a href="index.php?c=Receta&a=index">Recetas</a></li>
            <li><a href="index.php?c=RegistroR&a=index">Registro</a></li>
        </ul>
    </div>

    <div class="container">
        <!-- Tabla de pacientes existentes -->
        <table id="tabla-pacientes" class="styled-table">
            <!-- Encabezado de la tabla -->
            <thead>
                <tr>
                    <th>ID Receta</th>
                    <th>ID Paciente</th>
                    <th>Nombre del Paciente</th>
                    <th>Nombre del Doctor</th>
                    <th>Fecha de Creación</th>
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
            <?php
                foreach ($data['recetas'] as $dato) {
                    echo "<tr>";
                    echo "<td>" . $dato['ID_Receta'] . "</td>";
                    echo "<td>" . $dato['ID_Paciente'] . "</td>";
                    echo "<td>" . $dato['NombreCompletoPaciente'] . "</td>";
                    echo "<td>" . $dato['NombreCompletoMedico'] . "</td>"; // Mostrar el nombre completo del médico
                    echo "<td>" . $dato['FechaCreacion'] . "</td>";
                    echo "<td>" . $dato['Edad'] . "</td>";
                    echo "<td>" . $dato['Peso'] . "</td>";
                    echo "<td>" . $dato['Temperatura'] . "</td>";
                    echo "<td>" . $dato['Talla'] . "</td>";
                    echo "<td>" . $dato['TensionArterial'] . "</td>";
                    echo "<td>" . $dato['SO2'] . "</td>";
                    echo "<td>" . $dato['Dx'] . "</td>";
                    echo "<td>" . $dato['Receta'] . "</td>";
                    echo "<td>";
                    echo "<div class='eliminar-container'>";
                    echo "<button onclick=\"window.location.href='index.php?c=DetallesR&a=index&id=" . $dato['ID_Paciente'] . "'\">Editar</button>";
                    echo "<form action='index.php?c=Pacientes&a=eliminarPaciente' method='post'>";
                    echo "<input type='hidden' name='id_paciente' value='" . $dato['ID_Paciente'] . "'>";
                    echo "<button type='submit' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este paciente?')\">Eliminar</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
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
