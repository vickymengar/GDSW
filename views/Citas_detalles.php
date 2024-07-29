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
if (isset($data['detalleCita'])) {
    $detalle_cita = $data['detalleCita'];
?>


    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/stylecitas.css">
        <link rel="icon" href="img/isoazul.png">
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
                <a href="index.php?c=Chatbot&a=index">ChatBot</a>
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
            <header>Aivi</header>
            <form id="actualizarForm" action="index.php?c=DetallesC&a=actualizarCita" onsubmit="return validarCita();" method="post">
                <input type="hidden" name="idCita" value="<?php echo $detalle_cita['ID_Cita']; ?>">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Datos De La Cita</span>


                        <div class="fields">
                            <div class="input-field">
                                <label>ID Paciente</label>
                                <select id="idPaciente" name="idPaciente" required>
                                    <!-- Opciones para los pacientes -->
                                    <?php foreach ($lista_pacientes as $paciente) : ?>
                                        <!-- Verificar si el ID del paciente coincide con el ID asociado a la cita -->
                                        <?php $selected = ($paciente['ID_Paciente'] == $detalle_cita['ID_Paciente']) ? 'selected' : ''; ?>
                                        <option value="<?php echo $paciente['ID_Paciente']; ?>" <?php echo $selected; ?>>
                                            <?php echo $paciente['ID_Paciente']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Nombre Paciente</label>
                                <input id="nombrepaciente" name="nombrePaciente" type="text" placeholder="Nombre del paciente" required readonly>
                            </div>

                            <div class="input-field">
                                <label for="idMedico">Nombre Médico</label>
                                <select id="idMedico" name="idMedico" required>
                                    <option value="" disabled selected>Selecciona un médico</option>
                                    <?php foreach ($medicos['medicos'] as $medico) : ?>
                                        <?php if ($medico['ID_Medico'] == $detalle_cita['ID_Medico']) : ?>
                                            <option value="<?php echo $medico['ID_Medico']; ?>" selected><?php echo $medico['NombreCompletoMedico']; ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $medico['ID_Medico']; ?>"><?php echo $medico['NombreCompletoMedico']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Fecha</label>
                                <input id="fecha" name="fecha" type="date" value="<?php echo $detalle_cita['Fecha']; ?>" required>
                            </div>

                            <div class="input-field">
                                <label>Hora</label>
                                <input id="hora" name="hora" type="time" value="<?php echo $detalle_cita['Hora']; ?>" required>
                            </div>

                            <div class="input-field">
                                <label for="estado">Estado</label>
                                <select id="estado" name="estado" required>
                                    <option value="" disabled selected>Selecciona un estado</option>
                                    <!-- Mostrar el estado actual preseleccionado -->
                                    <option value="<?php echo $estados_cita['estado_actual']; ?>" selected>
                                        <?php echo $estados_cita['estado_actual']; ?>
                                    </option>

                                    <!-- Mostrar los demás estados disponibles -->
                                    <?php $estados_predefinidos = array('Programada', 'Confirmada', 'Cancelada', 'Completada'); ?>
                                    <?php foreach ($estados_predefinidos as $estado) : ?>
                                        <!-- Evitar mostrar el estado actual nuevamente -->
                                        <?php if ($estado != $estados_cita['estado_actual']) : ?>
                                            <option value="<?php echo $estado; ?>">
                                                <?php echo $estado; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="input-field">
                                <label for="motivo">Motivo</label>
                                <textarea id="motivo" name="motivo" placeholder="Ingrese el motivo" rows="5" required><?php echo $detalle_cita['Motivo']; ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="boton efecto3">Actualizar</button>
                        <button type="button" class="boton efecto3" onclick="window.location.href='index.php?c=Citas&a=index'">Cancelar</button>
                    </div>
                </div>
            </form>

        </div>

        <script src="js/citas.js"></script>
        <script src="js/citas_detalles.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script>
            function validarCita() {
                var idPaciente = document.getElementById("idPaciente").value;
                var fecha = document.getElementById("fecha").value;
                var hora = document.getElementById("hora").value;

                // Realizar una solicitud AJAX al servidor para verificar la existencia de una cita en la misma fecha y hora
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "index.php?c=DetallesC&a=validarCita", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Obtener la respuesta del servidor
                        var respuesta = xhr.responseText;
                        if (respuesta === "existe") {
                            // Mostrar un mensaje de error si ya existe una cita en la misma fecha y hora
                            alert("Ya existe una cita programada para esta fecha y hora.");
                        } else if (respuesta === "no_existe") {
                            // Si no existe una cita en la misma fecha y hora, permitir el envío del formulario
                            document.getElementById("actualizarForm").submit();
                        } else {
                            // Hubo un error en la validación de la cita, mostrar un mensaje de error genérico
                            alert("Error al validar la cita.");
                        }
                    }
                };
                // Enviar los datos del formulario al servidor
                xhr.send("idPaciente=" + idPaciente + "&fecha=" + fecha + "&hora=" + hora);
                return false; // Evitar que se envíe el formulario automáticamente
            }
        </script>


        <script>
            // Obtener la fecha actual
            var today = new Date();

            // Ajustar al huso horario de México (UTC-6)
            today.setHours(today.getHours() - 6);

            // Formatear la fecha como yyyy-mm-dd (necesario para el campo de fecha)
            var formattedDate = today.toISOString().slice(0, 10);

            // Establecer la fecha mínima en el campo de fecha de venta
            document.getElementById("fecha").setAttribute("min", formattedDate);
        </script>

        <script>
            $(document).ready(function() {
                // Obtener el ID del paciente preseleccionado al cargar la página
                var idPaciente = $('#idPaciente').val();

                // Llamar a la función para obtener el nombre del paciente al cargar la página
                obtenerNombrePaciente(idPaciente);

                // Función para obtener el nombre del paciente
                function obtenerNombrePaciente(id) {
                    $.ajax({
                        type: 'GET',
                        url: 'index.php?c=DetallesC&a=obtenerNombrePacientePorId&id=' + id,
                        success: function(nombrePaciente) {
                            $('#nombrepaciente').val(nombrePaciente);
                        }
                    });
                }

                // Detectar cambios en el campo de selección de pacientes
                $('#idPaciente').change(function() {
                    var idPaciente = $(this).val();

                    // Llamar a la función para obtener el nombre del paciente cuando cambia la selección
                    obtenerNombrePaciente(idPaciente);
                });
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
<?php
} else {
    // Si no se proporcionaron los detalles del paciente, muestra un mensaje de error
    echo "No se encontraron detalles del la cita";
}
?>