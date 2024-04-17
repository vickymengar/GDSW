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
    <style>
        .eliminar-container {
            display: inline-block;
            margin-left: 10px; /* Ajusta este valor según sea necesario */
        }
    </style>
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
            <li><a href="index.php?c=Citas&a=index">Citas</a></li>
            <li><a href="index.php?c=RegistroC&a=index">Registro</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Búsqueda">
        </div>
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
                    echo "<td>";
                    echo "<button onclick=\"window.location.href='index.php?c=DetallesC&a=index&id=" . $cita['ID_Cita'] . "'\">Editar</button>";
                    echo "<div class='eliminar-container'>";
                    echo "<form action='index.php?c=Citas&a=eliminarCita' method='post'>";
                    echo "<input type='hidden' name='id_cita' value='" . $cita['ID_Cita'] . "'>";
                    echo "<button type='submit' onclick=\"return confirm('¿Estás seguro de que deseas eliminar esta cita?')\">Eliminar</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/citas.js"></script>
    <script>
        const searchInput = document.getElementById('search-input');
        const tbodyPacientes = document.getElementById('tbody-pacientes');
                    
        searchInput.addEventListener('keyup', function() {
          const searchTerm = this.value.toLowerCase();
          const rows = tbodyPacientes.getElementsByTagName('tr');
        
          for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
        
            let found = false;
            for (let j = 0; j < cells.length; j++) { // Check all columns
              const cellText = cells[j].textContent.toLowerCase();
              if (cellText.includes(searchTerm)) {
                found = true;
                break;
              }
            }
        
            if (found) {
              row.style.display = '';
            } else {
              row.style.display = 'none';
            }
          }
        });
    </script>
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
