// Llama a la función para mostrar el contenido del primer contenedor al cargar la página
window.onload = function() {
    mostrarContenido(1);
};

// Función para mostrar el contenido del contenedor correspondiente al número
function mostrarContenido(numero) {
    // Ocultar todos los contenedores
    var contenidos = document.getElementsByClassName("contenido");
    for (var i = 0; i < contenidos.length; i++) {
        contenidos[i].style.display = "none";
    }

    // Mostrar el contenedor correspondiente al número
    var contenidoMostrar = document.getElementById("contenido-" + numero);
    contenidoMostrar.style.display = "block";

    // Si se muestra el contenido 1, obtener los datos de la tabla
    if (numero === 1) {
        obtenerDatosTabla();
    }
}

// Función para obtener los datos de la tabla desde el servidor
function obtenerDatosTabla() {
    // Simulación de la respuesta del servidor con los datos de la tabla
    var pacientes = [
        { id: 1, nombre: 'Juan', apellidoPaterno: 'Pérez', apellidoMaterno: 'López', edad: 30, idMedico: 1 }
    ];
    // Llama a la función para crear la tabla con los datos obtenidos
    crearTabla(pacientes);
}

// Función para crear la tabla con los datos obtenidos
function crearTabla(pacientes) {
    var tabla = '<table>';
    tabla += '<tr><th>ID Paciente</th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th><th>Edad</th><th>ID Doctor</th><th>Opciones</th></tr>';
    for (var i = 0; i < pacientes.length; i++) {
        tabla += '<tr>';
        tabla += '<td>' + pacientes[i].id + '</td>';
        tabla += '<td>' + pacientes[i].nombre + '</td>';
        tabla += '<td>' + pacientes[i].apellidoPaterno + '</td>';
        tabla += '<td>' + pacientes[i].apellidoMaterno + '</td>';
        tabla += '<td>' + pacientes[i].edad + '</td>';
        tabla += '<td>' + pacientes[i].idDoctor + '</td>';
        tabla += '<td><button onclick="editar(' + pacientes[i].id + ')">Editar</button>';
        tabla += '<button onclick="ver(' + pacientes[i].id + ')">Ver</button>';
        tabla += '<button onclick="eliminar(' + pacientes[i].id + ')">Eliminar</button></td>';
        tabla += '</tr>';
    }
    tabla += '</table>';
    document.getElementById('tabla-container').innerHTML = tabla;
}

// Funciones para las opciones de la tabla
function editar(id) {
    console.log('Editar paciente con ID:', id);
}

function ver(id) {
    console.log('Ver paciente con ID:', id);
}

function eliminar(id) {
    console.log('Eliminar paciente con ID:', id);
}

// Variables globales
var currentFase = 1; // Fase actual del formulario

// Función para avanzar a la siguiente fase
function nextFase() {
    if (currentFase < 3) {
        currentFase++;
        updateFase();
    }
}

// Función para retroceder a la fase anterior
function previousFase() {
    if (currentFase > 1) {
        currentFase--;
        updateFase();
    }
}

// Función para actualizar la visualización de las fases y la barra de progreso
function updateFase() {
    var fases = document.getElementsByClassName("fase");
    for (var i = 0; i < fases.length; i++) {
        if (i + 1 === currentFase) {
            fases[i].style.display = "block";
        } else {
            fases[i].style.display = "none";
        }
    }
    // Actualizar la barra de progreso
    var progressBar = document.getElementById("progress-bar");
    var progress = (currentFase - 1) * 33.33; // Calcula el porcentaje de progreso
    progressBar.style.width = progress + "%";
}

// Función para enviar el formulario
function submitForm() {
    // Aquí puedes agregar lógica para enviar el formulario
    alert("Formulario enviado correctamente.");
}
