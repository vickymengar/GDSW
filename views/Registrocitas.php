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
        <header>AIVI</header>
        <form id="registroForm" action="index.php?c=RegistroC&a=registrarC" onsubmit="return validarCita();" method="post">
    <div class="form first">
        <div class="details personal">
            <span class="title">Datos De La Cita</span>

            <div class="fields">
                <div class="input-field">
                    <label>ID Paciente</label>
                    <select id="idPaciente" name="idPaciente"required>
                        <option value="" disabled selected>Selecciona un paciente</option>
                        <?php foreach ($data['ids_pacientes'] as $id): ?>
                        <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-field">
                    <label>Nombre Paciente</label>
                    <input id="nombrepaciente" name="nombrePaciente" type="text" placeholder="Nombre del paciente" required readonly>
                </div>

                <div class="input-field">
                    <label for="idMedico">Nombre Médico</label>
                    <select id="idMedico" name="idMedico"required>
                        <option value="" disabled selected>Selecciona un médico</option>
                        <?php foreach ($medicos as $medico): ?>
                                    <option value="<?php echo $medico['ID_Medico']; ?>"><?php echo $medico['NombreCompletoMedico']; ?></option>
                                <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-field">
                    <label>Fecha</label>
                    <input id="fecha" name="fecha" type="date" required>
                </div>

                <div class="input-field">
                    <label>Hora</label>
                    <input id="hora" name="hora" type="time" required>
                </div>

                <div class="input-field">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <option value="" disabled selected>Selecciona un estado</option>
                        <?php foreach ($data['estados_disponibles'] as $estado): ?>
                        <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-field">
                    <label for="motivo">Motivo</label>
                    <textarea id="motivo" name="motivo" placeholder="Ingrese el motivo" rows="5" required></textarea>
                </div>
            </div>
            <button type="submit" class="boton efecto3">Registrar cita</button>
            <button type="reset" class="boton efecto3">Limpiar</button>
        </div>
    </div>
</form>


        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#idPaciente').change(function() {
            var idPaciente = $(this).val();

            $.ajax({
                type: 'GET',
                url: 'index.php?c=RegistroC&a=obtenerNombrePacientePorId&id=' + idPaciente,
                success: function(nombrePaciente) {
                    $('#nombrepaciente').val(nombrePaciente);
                }
            });
        });
    });
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
    // Obtener la fecha actual
    var today = new Date();
    // Ajustar al huso horario de México (UTC-6)
    today.setHours(today.getHours() - 6);

    // Formatear la fecha como yyyy-mm-dd (necesario para el campo de fecha)
    var formattedDate = today.toISOString().slice(0, 10);

    // Obtener el campo de fecha y hora
    var fechaInput = document.getElementById("fecha");
    var horaInput = document.getElementById("hora");

    // Establecer la fecha mínima en el campo de fecha
    fechaInput.setAttribute("min", formattedDate);

    // Función para manejar el evento de cambio en el campo de fecha
    fechaInput.addEventListener("change", function() {
        // Obtener la fecha seleccionada por el usuario
        var selectedDate = new Date(this.value);
        // Comparar con la fecha actual
        if (selectedDate.toDateString() === today.toDateString()) {
            // Si la fecha seleccionada es la fecha actual, establecer la hora mínima en la hora actual
            var currentHour = today.getHours();
            var currentMinute = today.getMinutes();
            var currentFormattedTime = ("0" + currentHour).slice(-2) + ":" + ("0" + currentMinute).slice(-2);
            horaInput.setAttribute("min", currentFormattedTime);
        } else {
            // Si la fecha seleccionada es en el futuro, no se establece una hora mínima
            horaInput.removeAttribute("min");
        }
    });
</script>


<script>
function validarCita() {
    var idPaciente = document.getElementById("idPaciente").value;
    var fecha = document.getElementById("fecha").value;
    var hora = document.getElementById("hora").value;
    
    // Realizar una solicitud AJAX al servidor para verificar la existencia de una cita en la misma fecha y hora
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?c=RegistroC&a=validarCita", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Obtener la respuesta del servidor
            var respuesta = xhr.responseText;
            if (respuesta === "existe") {
                // Mostrar un mensaje de error si ya existe una cita en la misma fecha y hora
                alert("Ya existe una cita programada para esta fecha y hora.");
            } else if (respuesta === "no_existe") {
                // Si no existe una cita en la misma fecha y hora, permitir el envío del formulario
                document.getElementById("registroForm").submit();
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
