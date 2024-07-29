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

        <form id="actualizarForm" action="index.php?c=DetallesR&a=actualizarReceta" method="post">
            <input type="hidden" name="idCita" value="<?php echo $detalle_receta['ID_Receta']; ?>">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Datos Del Médico</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nombreMedico">Nombre Del Médico</label>
                            <select id="nombreMedico" name="nombreMedico" required>
                                <option value="">Seleccione un Médico</option>
                                <?php foreach ($medicos['medicos'] as $medico) : ?>
                                    <?php if ($medico['ID_Medico'] == $detalle_receta['ID_Medico']) : ?>
                                        <option value="<?php echo $medico['ID_Medico']; ?>" selected><?php echo $medico['NombreCompletoMedico']; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $medico['ID_Medico']; ?>"><?php echo $medico['NombreCompletoMedico']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-field">
                            <label for="cedulaProfesional">Cedula Profesional</label>
                            <input id="cedulaProfesional" name="cedulaProfesional" type="text" placeholder="Cédula Profesional" required readonly>
                        </div>

                        <div class="input-field">
                            <label>Fecha</label>
                            <input type="date" name="fecha" placeholder="Ingrese Los Datos" value="<?php echo $detalle_receta['FechaCreacion']; ?>" required>
                        </div>

                    </div>
                </div>

                <div class="details ID"> <!-- Datos paciente -->
                    <span class="title">Datos Del Paciente</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nombrePaciente">Nombre Del Paciente</label>
                            <select id="nombrePaciente" name="nombrePaciente" required>
                                <option value="">Seleccione un Paciente</option>

                                <!-- Opciones para los pacientes -->
                                <?php foreach ($lista_pacientes as $paciente) : ?>
                                    <?php $selected = ($paciente['ID_Paciente'] == $detalle_receta['ID_Paciente']) ? 'selected' : ''; ?>
                                    <option value="<?php echo $paciente['ID_Paciente']; ?>" <?php echo $selected; ?>>
                                        <?php echo $paciente['NombreCompletoPaciente']; ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="input-field">
                            <label for="edadPaciente">Edad</label>
                            <input id="edadPaciente" name="edadPaciente" type="text" placeholder="Edad del Paciente" required readonly>
                        </div>

                        <div class="input-field">
                            <label>Peso</label>
                            <input type="number" name="peso" placeholder="Ingrese Los Datos" value="<?php echo $detalle_receta['Peso']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Temperatura</label>
                            <input type="text" name="temperatura" placeholder="Ingrese Los Datos" value="<?php echo $detalle_receta['Temperatura']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Talla</label>
                            <input type="number" name="talla" placeholder="Ingrese Los Datos" value="<?php echo $detalle_receta['Talla']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>T/A</label>
                            <input type="text" name="tensionArterial" placeholder="Ingrese Los Datos" value="<?php echo $detalle_receta['TensionArterial']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>SO2</label>
                            <input type="number" name="so2" placeholder="Ingrese Los Datos" value="<?php echo $detalle_receta['SO2']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Dx</label>
                            <input type="text" name="diagnostico" placeholder="Ingrese Los Datos" value="<?php echo $detalle_receta['Dx']; ?>" required>
                        </div>

                    </div>
                </div>

                <div class="details diagnostico-form"> <!-- Datos de diagnóstico -->
                    <span class="title">Receta Medica</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Receta</label>
                            <textarea name="receta" placeholder="Ingrese la receta médica" rows="4" required><?php echo $detalle_receta['Receta']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="boton efecto3">Actualizar</button>
            <button type="button" class="boton efecto3" onclick="window.location.href='index.php?c=Receta&a=index'">Cancelar</button>
        </form>
    </div>

    <script src="../js/recetas.js"></script>
    <script src="../js/recetas_detalles.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Obtener el ID del paciente preseleccionado al cargar la página
            var idPaciente = $('#nombrePaciente').val();

            // Llamar a la función para obtener el nombre del paciente al cargar la página
            obtenerEdadPaciente(idPaciente);

            // Función para obtener el nombre del paciente
            function obtenerEdadPaciente(id) {
                $.ajax({
                    type: 'GET',
                    url: 'index.php?c=DetallesR&a=obtenerEdadPacientePorId&id=' + id,
                    success: function(edadPaciente) {
                        $('#edadPaciente').val(edadPaciente);
                    }
                });
            }

            // Detectar cambios en el campo de selección de pacientes
            $('#nombrePaciente').change(function() {
                var idPaciente = $(this).val();

                // Llamar a la función para obtener el nombre del paciente cuando cambia la selección
                obtenerEdadPaciente(idPaciente);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Obtener el ID del paciente preseleccionado al cargar la página
            var idMedico = $('#nombreMedico').val();

            // Llamar a la función para obtener el nombre del paciente al cargar la página
            obtenerCedulaMedico(idMedico);

            // Función para obtener el nombre del paciente
            function obtenerCedulaMedico(id) {
                $.ajax({
                    type: 'GET',
                    url: 'index.php?c=DetallesR&a=obtenerCedulaDoctorPorId&id=' + id,
                    success: function(cedulaMedico) {
                        $('#cedulaProfesional').val(cedulaMedico);
                    }
                });
            }

            // Detectar cambios en el campo de selección de pacientes
            $('#nombreMedico').change(function() {
                var idMedico = $(this).val();

                // Llamar a la función para obtener el nombre del paciente cuando cambia la selección
                obtenerCedulaMedico(idMedico);
            });
        });
    </script>
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