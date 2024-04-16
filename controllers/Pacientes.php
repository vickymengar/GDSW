<?php

    class PacientesController {

        public function index() {

            require_once "models/pacientes/PacientesModel.php";
            $pacientes = new Pacientes_model();
            $data["titulo"] = "Pacientes";
            $data["pacientes"] = $pacientes->get_pacientes();

            require_once "views/Pacientes1.php";
        }

        public function eliminarPaciente() {
            // Verificar si se ha proporcionado un ID de paciente
            if(isset($_POST['id_paciente'])) {
                // Obtener el ID del paciente desde el formulario
                $idPaciente = $_POST['id_paciente'];
                
                // Instanciar el modelo de pacientes
                require_once "models/pacientes/PacientesModel.php";
                $pacientes_model = new Pacientes_model();
                
                // Intentar eliminar al paciente
                $eliminado = $pacientes_model->eliminar_paciente($idPaciente);
                
                // Verificar si se eliminó correctamente
                if($eliminado) {
                    // Redirigir a la página de pacientes
                    header("Location: index.php?c=Pacientes&a=index");
                    exit();
                } else {
                    // Manejar el error de eliminación
                    echo "Error al intentar eliminar el paciente.";
                }
            } else {
                // Manejar el error de falta de ID de paciente
                echo "No se proporcionó un ID de paciente para eliminar.";
            }
        }

    }

?>