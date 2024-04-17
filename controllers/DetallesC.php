<?php

// DetallesCController.php

class DetallesCController {

    private $idCita;

    public function index() {

        require_once "models/citas/CitasModel.php";
        // Verificar si se ha proporcionado el ID de la cita
        if (isset($_GET['id'])) {
            // Obtener el ID de la cita desde la URL
            $this->idCita = $_GET['id']; // Asignar el valor a la propiedad $idCita

            // Crear una instancia del modelo de citas
            $citas_model = new Citas_model();

            // Obtener los detalles de la cita por su ID
            $detalle_cita = $citas_model->obtener_datos_cita_por_id($this->idCita);

            // Verificar si se encontraron detalles de la cita
            if ($detalle_cita) {
                $data['detalleCita'] = $detalle_cita;
                // Obtener el médico asociado a la cita
                $medico_cita = $citas_model->get_medico_por_id_cita($this->idCita);
                
                // Obtener el paciente asociado a la cita
                $paciente_cita = $citas_model->obtener_paciente_por_id_cita($this->idCita);

                // Obtener la lista de todos los pacientes
                $lista_pacientes = $citas_model->obtener_lista_pacientes();

              

                // Verificar si se encontró el médico asociado a la cita
                if ($medico_cita && $paciente_cita) {
                    // Cargar la vista de detalles de la cita y pasar los datos necesarios
                    require_once "models/citas/CitasModel.php";
                    $model = new Citas_model();
                    $medicos['medicos'] = $model->get_medicos(); // Obtener todos los médicos disponibles
                    // Obtener el médico a cargo del paciente
                    $data['medicoACargo'] = $model->get_medico_por_id_cita( $this->idCita); // Usar  $this->idCita
                    $estados_cita = $model->obtener_estados_cita($this->idCita);
                    require_once 'views/Citas_detalles.php';
                } else {
                    // Mostrar un mensaje de error si no se encontró el médico asociado
                    echo "No se encontró el médico asociado a la cita.";
                }
            } else {
                // Mostrar un mensaje de error si no se encontraron detalles de la cita
                echo "No se encontraron detalles de la cita.";
            }
        } else {
            // Mostrar un mensaje de error si no se proporcionó el ID de la cita
            echo "Se requiere proporcionar el ID de la cita.";
        }
    }

    public function obtenerNombrePacientePorId() {
        if (isset($_GET['id'])) {
           
             // Obtener el ID del paciente enviado desde la solicitud AJAX
        $idPaciente = $_GET['id'];

  
            // Instanciar el modelo de citas
            require_once "models/citas/CitasModel.php";
            $citas_model = new Citas_model();

            // Obtener el nombre del paciente por su ID
            $nombrePaciente = $citas_model->obtener_nombre_paciente_por_id($idPaciente);

            echo $nombrePaciente;
        }
    }

    public function actualizarCita() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recuperar los datos del formulario de actualización
            $idCita = $_POST['idCita'];
            $idPaciente = $_POST['idPaciente'];
            $idMedico = $_POST['idMedico'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado = $_POST['estado'];
            $motivo = $_POST['motivo'];

            // Llamar al modelo para actualizar la cita
            require_once "models/citas/CitasModel.php";
            $citas_model = new Citas_model();
            $resultado = $citas_model->actualizarCita($idCita, $idPaciente, $idMedico, $fecha, $hora, $estado, $motivo);

            // Verificar si la actualización fue exitosa
            if ($resultado) {
                // Redirigir a la página de detalles de la cita actualizada
                header("Location: index.php?c=Citas&a=index");
                exit();
            } else {
                // Mostrar un mensaje de error
                echo "Error al actualizar la cita.";
            }
        }
    }
}

?>
