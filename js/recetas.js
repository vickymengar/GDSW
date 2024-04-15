// Obtener los pacientes del almacenamiento local
var pacientes = JSON.parse(localStorage.getItem('pacientes')) || [];

// Obtener el tbody de la tabla
var tbody = document.getElementById('tbody-pacientes');

// Generar las filas de la tabla con los datos de los pacientes
pacientes.forEach(function(paciente, index) {
    var tr = document.createElement('tr');
    tr.innerHTML = `
        <td>${paciente.ID_Receta}</td>
        <td>${paciente.ID_Medico}</td>
        <td>${paciente.ID_Paciente}</td>
        <td>${paciente.FechaCreacion}</td>
        <td>${paciente.NombrePaciente}</td>
        <td>${paciente.ApellidoPPaciente}</td>
        <td>${paciente.ApellidoMPaciente}</td>
        <td>${paciente.Edad}</td>
        <td>${paciente.Peso}</td>
        <td>${paciente.Temperatura}</td>
        <td>${paciente.Talla}</td>
        <td>${paciente.TensionArterial}</td>
        <td>${paciente.SO2}</td>
        <td>${paciente.Dx}</td>
        <td>${paciente.Receta}</td>
        <td>
            <button onclick="editarPaciente(${index})">Editar</button>
            <button onclick="eliminarPaciente(${index})">Eliminar</button>
        </td>
    `;
    tbody.appendChild(tr);
});

// Función para eliminar un paciente
function eliminarPaciente(index) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar esta receta?");
    if (confirmacion) {
        // Remover el paciente del array
        pacientes.splice(index, 1);

        // Actualizar el almacenamiento local
        localStorage.setItem('pacientes', JSON.stringify(pacientes));

        // Actualizar la tabla
        actualizarTabla();
    } else {
        // No hacer nada si el usuario cancela la eliminación
    }
}

// Función para editar un paciente
function editarPaciente(index) {
   // Redirigir a la página de detalles del paciente
   window.location.href = 'Receta_detalles.php';
}

// Función para actualizar la tabla
function actualizarTabla() {
    // Limpiar el contenido actual de la tabla
    tbody.innerHTML = '';

    // Generar las filas de la tabla con los datos actualizados de los pacientes
    pacientes.forEach(function(paciente, index) {
        var tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${paciente.ID_Receta}</td>
            <td>${paciente.ID_Medico}</td>
            <td>${paciente.ID_Paciente}</td>
            <td>${paciente.FechaCreacion}</td>
            <td>${paciente.NombrePaciente}</td>
            <td>${paciente.ApellidoPPaciente}</td>
            <td>${paciente.ApellidoMPaciente}</td>
            <td>${paciente.Edad}</td>
            <td>${paciente.Peso}</td>
            <td>${paciente.Temperatura}</td>
            <td>${paciente.Talla}</td>
            <td>${paciente.TensionArterial}</td>
            <td>${paciente.SO2}</td>
            <td>${paciente.Dx}</td>
            <td>${paciente.Receta}</td>
            <td>
                <button onclick="editarPaciente(${index})">Editar</button>
                <button onclick="eliminarPaciente(${index})">Eliminar</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function registrarPaciente() {
    var idPaciente = document.getElementById('idPaciente').value;
    var nombre = document.getElementById('nombre').value;
    var apellidoPaterno = document.getElementById('apellidoPaterno').value;
    var apellidoMaterno = document.getElementById('apellidoMaterno').value;
    var edad = document.getElementById('edad').value;
    var idMedico = document.getElementById('idMedico').value;

    var paciente = {
        ID_Paciente: idPaciente,
        NombrePaciente: nombre,
        ApellidoPPaciente: apellidoPaterno,
        ApellidoMPaciente: apellidoMaterno,
        Edad: edad,
        ID_Medico: idMedico
    };

    var pacientes = JSON.parse(localStorage.getItem('pacientes')) || [];
    pacientes.push(paciente);
    localStorage.setItem('pacientes', JSON.stringify(pacientes));

    // Redirigir a la página de citas
    window.location.href = 'Receta.php';
}
