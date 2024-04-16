<?php
class DetallesPController {
    private $idPaciente; // Definir la propiedad $idPaciente
    
    public function index() {
        // Verificar si se ha proporcionado un ID de paciente en la URL
        if (isset($_GET['id'])) {
            $this->idPaciente = $_GET['id']; // Asignar el valor a la propiedad $idPaciente
            
            // Instanciar el modelo de pacientes
            require_once "models/pacientes/PacientesModel.php";
            $pacientes_model = new Pacientes_model();
            
            // Obtener los detalles del paciente por su ID
            $detallePaciente = $pacientes_model->obtener_paciente_por_id($this->idPaciente); // Usar $this->idPaciente

            // Verificar si se encontraron detalles para el paciente
            if ($detallePaciente) {
                // Pasar los detalles del paciente a la vista
                $data['detallePaciente'] = $detallePaciente;
                require_once "models/pacientes/PacientesModel.php";
                $model = new Pacientes_model();
                $medicos['medicos'] = $model->get_medicos(); // Obtener todos los médicos disponibles
                
                // Obtener el médico a cargo del paciente
                $data['medicoACargo'] = $model->get_medico_por_id_paciente($this->idPaciente); // Usar $this->idPaciente

                require_once "views/Pacientes_detalles.php";
            } else {
                // Si no se encontraron detalles, redirigir a una página de error o manejarlo de otra manera
                echo "No se encontraron detalles para el paciente con ID: $this->idPaciente"; // Usar $this->idPaciente
            }
        } else {
            // Si no se proporcionó un ID de paciente, redirigir a una página de error o manejarlo de otra manera
            echo "No se proporcionó un ID de paciente";
        }
    }

    // Método para manejar la actualización de los detalles del paciente
    public function actualizarPaciente() {
        // Verificar si se han enviado los datos del formulario de actualización
        if (isset($_POST['id_Paciente'], $_POST['nombre'], $_POST['apellidoPaterno'], $_POST['apellidoMaterno'], $_POST['edad'], $_POST['medico'])) {
            // Obtener los datos del formulario
            $idPaciente = $_POST['id_Paciente'];
            $nombre = $_POST['nombre'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $apellidoMaterno = $_POST['apellidoMaterno'];
            $edad = $_POST['edad'];
            $idMedico = $_POST['medico'];
            
            // Instanciar el modelo de pacientes
            require_once "models/pacientes/PacientesModel.php";
            $pacientes_model = new Pacientes_model();
            
            // Actualizar los detalles del paciente
            $actualizacionExitosa = $pacientes_model->actualizar_paciente($idPaciente, $nombre, $apellidoPaterno, $apellidoMaterno, $edad, $idMedico);
            
            if ($actualizacionExitosa) {
                // Redirigir a la página de detalles del paciente actualizado
                header("Location: index.php?c=Pacientes&a=index");
            } else {
                // Manejar el error en caso de que la actualización falle
                echo "Error: No se pudo actualizar el paciente.";
            }
        } else {
            // Si no se han enviado todos los datos del formulario, redirigir a una página de error o manejarlo de otra manera
            echo "Error: Faltan datos del formulario.";
        }
    }
}



?>
