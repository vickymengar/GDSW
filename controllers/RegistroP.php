<?php
class RegistropController {
    
    public function index() {
        require_once "models/pacientes/PacientesModel.php";
        $model = new Pacientes_model();
        $medicos = $model->get_medicos(); // Obtener lista de médicos
        require_once 'views/Registro.php';
    }

    public function registrarP() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $nombre = $_POST["nombre"];
            $apellidoPaterno = $_POST["apellidoPaterno"];
            $apellidoMaterno = $_POST["apellidoMaterno"];
            $edad = $_POST["edad"];
            $idMedico = $_POST["Medico"];
    
            // Registrar paciente
            require_once "models/pacientes/PacientesModel.php"; // Incluir el modelo
            $model = new Pacientes_model();
            $exito = $model->registrar_paciente($nombre, $apellidoPaterno, $apellidoMaterno, $edad, $idMedico);
            if ($exito) {
                echo 'Paciente registrado con éxito';
                $panel_url = 'index.php?c=Registrop&a=index';
                // Redirigir al usuario al panel principal
                header("Location: $panel_url");
            } else {
                
            }
            
    
        }
        require_once 'views/Registro.php';
    }
}

?>
