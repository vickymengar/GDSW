function actualizarDatos() {
    // Aquí puedes agregar el código para actualizar los datos
    console.log("Datos actualizados correctamente");
    alert("Datos actualizados");
}

function cancelar() {
    // Aquí puedes agregar el código para cancelar la operación
    console.log("Operación cancelada");
    var confirmacion = confirm("¿Seguro que desea cancelar?");
    if (confirmacion) {
        console.log("Operación cancelada confirmada");
    }
}
