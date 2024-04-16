<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style5.css">
    <link rel="icon" href="img/isoazul.png">
    <title>Citas</title>
</head>
<body>
    <div class="head">
        <div class="Logo">
            <a href="#"><img src="img/logoblanco.png" alt="Logo de la empresa" class="logo-img"></a>
        </div>
        <nav class="navbar">
            <a href="./Index.php">Inicio</a>
            <a href="./Pacientes1.php">Pacientes</a>
            <a href="index.php?c=Citas&a=index">Citas</a>
            <a href="./Receta.php">Recetas</a>
            <a href="#">Cerrar sesión</a>
        </nav>
    </div>
    <div class="bar2">
        <ul>
            <li><a href="index.php?c=Citas&a=index">Citas</a></li>
            <li><a href="index.php?c=RegistroC&a=index">Registro</a></li>
        </ul>
    </div>

    <div class="container">
        <!-- Tabla de pacientes existentes -->
        <table id="tabla-pacientes" class="styled-table">
            <!-- Encabezado de la tabla -->
            <thead>
                <tr>
                    <th>ID Cita</th>
                    <th>Nombre Del Paciente</th>
                    <th>Nombre Del Medico</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Motivo</th>
                    <th>Estado</th> <!-- Nueva columna para botones de acciones -->
                    <th>Acciones</th> <!-- Nueva columna para botones de acciones -->
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody id="tbody-pacientes">
            <?php
                foreach ($citas['citas'] as $cita) {
                    echo "<tr>";
                    echo "<td>" . $cita['ID_Cita'] . "</td>";
                    echo "<td>" . $cita['NombreCompletoPaciente'] . "</td>";
                    echo "<td>" . $cita['NombreCompletoMedico'] . "</td>";
                    echo "<td>" . $cita['Fecha'] . "</td>";
                    echo "<td>" . $cita['Hora'] . "</td>";
                    echo "<td>" . $cita['Motivo'] . "</td>";
                    echo "<td>" . $cita['Estado'] . "</td>"; // Mostrar el nombre completo del médico
                    echo "<td>Acciones</td>"; // Aquí podrías agregar los botones de acciones si los necesitas
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
