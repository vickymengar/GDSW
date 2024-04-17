<?php
class RegistroCController {
    
    public function index() {
       
        require_once 'models/citas/CitasModel.php'; // Incluir el modelo de citas
        
        // Instanciar el modelo de citas
        $citas_model = new Citas_model();
        
        // Obtener los nombres completos de los médicos
        $medicos = $citas_model->get_medicos();
        
        // Pasar los nombres de los médicos a la vist

        // Obtener los estados disponibles
        $estados_disponibles = $citas_model->get_estados_disponibles();
        
        // Pasar los estados disponibles a la vista
        $data['estados_disponibles'] = $estados_disponibles;

        
        $data['ids_pacientes'] = $citas_model->get_id_pacientes();

        require_once 'views/Registrocitas.php';

        require_once 'views/Registrocitas.php';
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

    public function registrarC() {
        // Verificar si se ha enviado el formulario para registrar una cita
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $idPaciente = $_POST["idPaciente"];
            $idMedico = $_POST["idMedico"];
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $estado = $_POST["estado"];
            $motivo = $_POST["motivo"];
            
            // Instanciar el modelo de citas
            require_once "models/citas/CitasModel.php";
            $citas_model = new Citas_model();
            
            // Insertar la cita en la base de datos
            $resultado = $citas_model->insertar_cita($idPaciente, $idMedico, $fecha, $hora, $estado, $motivo);
            
            // Verificar si la inserción fue exitosa
            if ($resultado) {
                // La cita se insertó correctamente
                echo "La cita se registró correctamente.";
                $panel_url = 'index.php?c=Citas&a=index';
                // Redirigir al usuario al panel principal
                header("Location: $panel_url");
            } else {
                // Hubo un error al insertar la cita
                echo "Hubo un error al registrar la cita.";
                // Aquí podrías redirigir a una página de error o mostrar un mensaje de error en la misma página
            }
        } else {
            // Si no se ha enviado el formulario, simplemente cargamos la vista del formulario de registro de citas
            require_once 'views/Registrocitas.php';
        }
    }

    
}
?>