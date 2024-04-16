<?php

// DetallesCController.php

class DetallesCController {
    public function index() {

        require_once "models/citas/CitasModel.php";
        // Verificar si se ha proporcionado el ID de la cita
        if (isset($_GET['id'])) {
            // Obtener el ID de la cita desde la URL
            $idCita = $_GET['id'];
            
            // Crear una instancia del modelo de citas
            $citas_model = new Citas_model();
            
            // Obtener los detalles de la cita por su ID
            $detalle_cita = $citas_model->obtener_cita_por_id($idCita);
            
            // Obtener el médico asociado a la cita
            $medico_cita = $citas_model->obtener_medico_por_id_cita($idCita);
            
            // Verificar si se encontraron detalles de la cita
            if ($detalle_cita) {
                // Cargar la vista de detalles de la cita y pasar los datos necesarios
                require_once 'views/Citas_detalles.php';
            } else {
                // Mostrar un mensaje de error si no se encontraron detalles de la cita
                echo "No se encontraron detalles de la cita.";
            }
        } else {
            // Mostrar un mensaje de error si no se proporcionó el ID de la cita
            echo "Se requiere proporcionar el ID de la cita.";
        }
    }
}

?>
