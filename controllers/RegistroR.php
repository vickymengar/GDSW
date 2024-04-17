<?php
class RegistroRController {

    public function index() {

        require_once "models/recetas/recetasModel.php";
        $model = new Receta_model();
        $medicos = $model->get_medicos();
        $pacientes = $model->get_pacientes(); // Obtener lista de médicos
        require_once "views/Registroreceta.php";
    }

    public function obtenerCedulaDoctorPorId() {
        if (isset($_GET['id'])) {
           
             // Obtener el ID del paciente enviado desde la solicitud AJAX
         $idMedico = $_GET['id'];

  
            // Instanciar el modelo de citas
            require_once "models/recetas/recetasModel.php";
            $model = new  Receta_model();

            // Obtener el nombre del paciente por su ID
            $cedulaMedico = $model->obtener_cedula_doctor_por_id($idMedico);

            echo $cedulaMedico;
        }
    }

    public function obtenerEdadPacientePorId() {
        if (isset($_GET['id'])) {
           
             // Obtener el ID del paciente enviado desde la solicitud AJAX
         $idPaciente = $_GET['id'];

  
            // Instanciar el modelo de citas
            require_once "models/recetas/recetasModel.php";
            $model = new  Receta_model();

            // Obtener el nombre del paciente por su ID
            $edadPaciente = $model->obtener_edad_paciente_por_id($idPaciente);

            echo $edadPaciente;
        }
    }

    public function registrarR() {
        // Verificar si se ha enviado el formulario para registrar una receta
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $idPaciente = $_POST["idPaciente"];
            $idMedico = $_POST["idMedico"];
            $fecha = $_POST["fecha"];
            $peso = $_POST["peso"];
            $temperatura = $_POST["temperatura"];
            $talla = $_POST["talla"];
            $tensionArterial = $_POST["tensionArterial"];
            $so2 = $_POST["so2"];
            $diagnostico = $_POST["diagnostico"];
            $receta = $_POST["receta"];
            
            // Instanciar el modelo de recetas
            require_once "models/recetas/recetasModel.php";
            $receta_model = new Receta_model();
            
            // Insertar la receta en la base de datos
            $resultado = $receta_model->insertar_receta($idPaciente, $idMedico, $fecha, $peso, $temperatura, $talla, $tensionArterial, $so2, $diagnostico, $receta);
            
            // Verificar si la inserción fue exitosa
            if ($resultado) {
                // La receta se insertó correctamente
                echo "La receta médica se registró correctamente.";
                $panel_url = 'index.php?c=Receta&a=index';
                // Redirigir al usuario al panel principal
                header("Location: $panel_url");
            } else {
                // Hubo un error al insertar la receta
                echo "Hubo un error al registrar la receta médica.";
                // Aquí podrías redirigir a una página de error o mostrar un mensaje de error en la misma página
            }
        } else {
            // Si no se ha enviado el formulario, simplemente cargamos la vista del formulario de registro de recetas
            require_once 'views/Registroreceta.php';
        }
    }
    

    
    
}
?>
