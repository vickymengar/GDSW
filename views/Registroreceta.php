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
    <link rel="stylesheet" href="css/style2.css">
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
            <a href="index.php?c=Chatbot&a=index">ChatBot</a>
            <a href="index.php?c=Logout&a=index">Cerrar sesión</a>
        </nav>
    </div>
    <div class="bar2">
        <ul>
            <li><a href="index.php?c=Receta&a=index">Recetas</a></li>
            <li><a href="index.php?c=RegistroR&a=index">Registro</a></li>
        </ul>
    </div>
    </div>

    <div class="container">
        <header>AIVI</header>

        <form action="index.php?c=RegistroR&a=registrarR" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Datos Del Médico</span>
                    <div class="fields">
                        <div class="input-field">
                            <label for="nombreMedico">Nombre Del Médico</label>
                            <select id="nombreMedico" name="idMedico" required>
                                <option value="" disabled selected>Selecciona un médico</option>
                                <?php foreach ($medicos as $medico) : ?>
                                    <option value="<?php echo $medico['ID_Medico']; ?>"><?php echo $medico['NombreCompletoMedico']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="cedulaProfesional">Cédula Profesional</label>
                            <input id="cedulaProfesional" name="cedulaProfesional" type="text" placeholder="Cédula Profesional" required readonly>
                        </div>
                        <div class="input-field">
                            <label>Fecha</label>
                            <input id="fecha" name="fecha" type="date" placeholder="Ingrese Los Datos" required>
                        </div>
                    </div>
                </div>

                <div class="details ID"> <!-- Datos paciente -->
                    <span class="title">Datos Del Paciente</span>
                    <div class="fields">
                        <div class="input-field">
                            <label for="nombrePaciente">Nombre Del Paciente</label>
                            <select id="nombrePaciente" name="idPaciente" required>
                                <option value="">Seleccione un Paciente</option>
                                <?php foreach ($pacientes as $paciente) : ?>
                                    <option value="<?php echo $paciente['ID_Paciente']; ?>"><?php echo $paciente['NombreCompletoPaciente']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="edadPaciente">Edad</label>
                            <input id="edadPaciente" name="edadPaciente" type="text" placeholder="Edad del Paciente" required readonly>
                        </div>
                        <div class="input-field">
                            <label>Peso</label>
                            <input id="peso" name="peso" type="number" placeholder="Ingrese el Peso" required>
                        </div>
                        <div class="input-field">
                            <label>Temperatura</label>
                            <input id="temperatura" name="temperatura" type="text" placeholder="Ingrese la Temperatura" required>
                        </div>
                        <div class="input-field">
                            <label>Talla</label>
                            <input id="talla" name="talla" type="number" placeholder="Ingrese la Talla" required>
                        </div>
                        <div class="input-field">
                            <label>T/A</label>
                            <input id="tensionArterial" name="tensionArterial" type="text" placeholder="Ingrese la Tensión Arterial" required>
                        </div>
                        <div class="input-field">
                            <label>SO2</label>
                            <input id="so2" name="so2" type="number" placeholder="Ingrese el SO2" required>
                        </div>
                        <div class="input-field">
                            <label>Dx</label>
                            <input id="dx" name="diagnostico" type="text" placeholder="Ingrese el Diagnóstico" required>
                        </div>
                    </div>
                </div>

                <div class="details diagnostico-form"> <!-- Datos de diagnóstico -->
                    <span class="title">Receta Médica</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Receta</label>
                            <textarea id="receta" name="receta" placeholder="Ingrese la receta médica" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="boton efecto3">
                Guardar Receta
            </button>
            <button type="reset" class="boton efecto3">Limpiar</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#nombreMedico').change(function() {
                var idMedico = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: 'index.php?c=RegistroR&a=obtenerCedulaDoctorPorId&id=' + idMedico,
                    success: function(cedulaMedico) {
                        $('#cedulaProfesional').val(cedulaMedico);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#nombrePaciente').change(function() {
                var idPaciente = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: 'index.php?c=RegistroR&a=obtenerEdadPacientePorId&id=' + idPaciente,
                    success: function(edadPaciente) {
                        $('#edadPaciente').val(edadPaciente);
                    }
                });
            });
        });
    </script>

    <script src="js/recetas.js"></script>

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
</body>

</html>