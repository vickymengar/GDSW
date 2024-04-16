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

// Verificar si se han pasado los detalles del paciente
if (isset($data['detallePaciente'])) {
    $detallePaciente = $data['detallePaciente'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style4.css">
    <link rel="icon" href="img/isoazul.png">
    <title>Detalles del Paciente</title>
    
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

    <div class="container">
        <header>Aivi</header>

        <form id="registroForm" action="index.php?c=DetallesP&a=actualizarPaciente" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Datos Del Paciente</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nombre</label>
                            <input id="nombre" name="nombre" type="text" value="<?php echo $detallePaciente['Nombre']; ?>" required>
                        </div>
                        
                        <div class="input-field">
                            <label>Apellido Paterno</label>
                            <input id="apellidoPaterno" name="apellidoPaterno"type="text" value="<?php echo $detallePaciente['ApellidoPaterno']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Apellido Materno</label>
                            <input id="apellidoMaterno" name="apellidoMaterno" type="text" value="<?php echo $detallePaciente['ApellidoMaterno']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Edad</label>
                            <input id="edad" name="edad" type="text" value="<?php echo $detallePaciente['Edad']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="Medico">Médico a cargo</label>
                            <select id="Medico" name="medico" class="input-field" required>
                                <option value="" disabled selected>Selecciona un médico</option>
                                <?php foreach ($medicos['medicos'] as $medico): ?>
                                <?php if ($medico['ID_Medico'] == $data['medicoACargo']['ID_Medico']): ?>
                                    <option value="<?php echo $medico['ID_Medico']; ?>" selected><?php echo $medico['NombreCompletoMedico']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $medico['ID_Medico']; ?>"><?php echo $medico['NombreCompletoMedico']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="hidden" name="id_Paciente" value="<?php echo $detallePaciente['ID_Paciente']; ?>">
                        <button type="submit" class="boton efecto3">Actualizar</button>
                        <button type="button" class="boton efecto3" onclick="window.location.href='index.php?c=Pacientes&a=index'">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="../js/pacientes.js"></script>
    <script src="../js/pacientes_detalles.js"></script>
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

<?php
} else {
    // Si no se proporcionaron los detalles del paciente, muestra un mensaje de error
    echo "No se encontraron detalles del paciente.";
}
?>
