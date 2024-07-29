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
    <link rel="stylesheet" href="css/style4.css">
    <link rel="icon" href="img/isoazul.png">
    <title>Registrar Paciente</title>

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
            <a href="index.php?c=Chatbot&a=index">ChatBot</a>
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
        <form id="registroForm" action="index.php?c=RegistroP&a=registrarP" method="POST">
            <div class="form">
                <div class="details personal">
                    <span class="title">Datos Del Paciente</span>
                    <div class="fields">
                        <div class="input-field">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text" placeholder="Ingrese el Nombre del Paciente" required>
                        </div>
                        <div class="input-field">
                            <label for="apellidoPaterno">Apellido Paterno</label>
                            <input id="apellidoPaterno" name="apellidoPaterno" type="text" placeholder="Ingrese el Apellido Paterno" required>
                        </div>
                        <div class="input-field">
                            <label for="apellidoMaterno">Apellido Materno</label>
                            <input id="apellidoMaterno" name="apellidoMaterno" type="text" placeholder="Ingrese el Apellido Materno" required>
                        </div>
                        <div class="input-field">
                            <label for="edad">Edad</label>
                            <input id="edad" name="edad" type="text" placeholder="Ingrese la Edad" required>
                        </div>
                        <div class="input-field">
                            <label for="Medico">Médico a cargo</label>
                            <select id="Medico" name="Medico" required>
                                <option value="" disabled selected>Selecciona un médico</option>
                                <?php foreach ($medicos as $medico) : ?>
                                    <option value="<?php echo $medico['ID_Medico']; ?>"><?php echo $medico['NombreCompletoMedico']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" class="boton efecto3" name="registrarPaciente">Registrar Paciente</button>
                    <button type="reset" class="boton efecto3">Limpiar</button>
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