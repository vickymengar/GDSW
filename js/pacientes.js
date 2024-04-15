// Obtener los pacientes del almacenamiento local
var pacientes = JSON.parse(localStorage.getItem('pacientes')) || [];

// Obtener el tbody de la tabla
var tbody = document.getElementById('tbody-pacientes');

// Generar las filas de la tabla con los datos de los pacientes
pacientes.forEach(function(paciente, index) {
    var tr = document.createElement('tr');
    tr.innerHTML = `
        <td>${paciente.idPaciente}</td>
        <td>${paciente.nombre}</td>
        <td>${paciente.apellidoPaterno}</td>
        <td>${paciente.apellidoMaterno}</td>
        <td>${paciente.edad}</td>
        <td>${paciente.idMedico}</td>
        <td>
            <button onclick="editarPaciente(${index})">Editar</button>
            <button onclick="eliminarPaciente(${index})">Eliminar</button>
        </td>
    `;
    tbody.appendChild(tr);
});

// Función para eliminar un paciente
function eliminarPaciente(index) {
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este paciente?");
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
   window.location.href = 'Pacientes_detalles.php';
}

// Función para actualizar la tabla
function actualizarTabla() {
    // Limpiar el contenido actual de la tabla
    tbody.innerHTML = '';

    // Generar las filas de la tabla con los datos actualizados de los pacientes
    pacientes.forEach(function(paciente, index) {
        var tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${paciente.idPaciente}</td>
            <td>${paciente.nombre}</td>
            <td>${paciente.apellidoPaterno}</td>
            <td>${paciente.apellidoMaterno}</td>
            <td>${paciente.edad}</td>
            <td>${paciente.idMedico}</td>
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
        idPaciente: idPaciente,
        nombre: nombre,
        apellidoPaterno: apellidoPaterno,
        apellidoMaterno: apellidoMaterno,
        edad: edad,
        idMedico: idMedico
    };

    var pacientes = JSON.parse(localStorage.getItem('pacientes')) || [];
    pacientes.push(paciente);
    localStorage.setItem('pacientes', JSON.stringify(pacientes));

    // Redirigir a la página de pacientes1.html
    window.location.href = 'Pacientes1.php';
}

function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabla-pacientes");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Change index to the column you want to search
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}