<?php
// PanelController.php

class DetallesRController {

    private $idReceta;


    public function index() {

        require_once "models/recetas/recetasModel.php";
       
        if (isset($_GET['id'])) {

        $this->idReceta = $_GET['id']; // Asignar el valor a la propiedad $idCita

        $model = new Receta_model();

        $detalle_receta = $model->obtener_datos_receta_por_id($this->idReceta);

        if ($detalle_receta) {
            $data['detalleReceta'] = $detalle_receta;
            // Obtener el médico asociado a la cita
            $medico_receta = $model->obtener_medico_por_id_receta($this->idReceta);
            
            // Obtener el paciente asociado a la cita
            $paciente_receta = $model->obtener_paciente_por_id_receta($this->idReceta);

            // Obtener la lista de todos los pacientes
            $lista_pacientes = $model->obtener_lista_pacientes();

          

            // Verificar si se encontró el médico asociado a la cita
            if ($medico_receta && $paciente_receta) {
                // Cargar la vista de detalles de la cita y pasar los datos necesarios
                require_once "models/recetas/recetasModel.php";
                $receta_model = new Receta_model();
                $medicos['medicos'] = $receta_model->get_medicos(); // Obtener todos los médicos disponibles
                // Obtener el médico a cargo del paciente
                $data['medicoACargo'] = $receta_model->obtener_medico_por_id_receta( $this->idReceta); // Usar  $this->idCita
                require_once 'views/Recetas_detalles.php';
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

    public function actualizarReceta() {
        // Verificar si se ha enviado el formulario para actualizar la receta
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $idCita = $_POST["idCita"];
            $idPaciente = $_POST["nombrePaciente"];
            $idMedico = $_POST["nombreMedico"];
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
            $receta_model = new  Receta_model();
            
            // Actualizar la receta en la base de datos
            $resultado = $receta_model->actualizarReceta($idCita, $idPaciente, $idMedico, $fecha, $peso, $temperatura, $talla, $tensionArterial, $so2, $diagnostico, $receta);
            
            // Verificar si la actualización fue exitosa
            if ($resultado) {
                // La receta se actualizó correctamente
                echo "La receta se actualizó correctamente.";
                $panel_url = 'index.php?c=Receta&a=index';
                // Redirigir al usuario al panel principal de recetas
                header("Location: $panel_url");
            } else {
                // Hubo un error al actualizar la receta
                echo "Hubo un error al actualizar la receta.";
                // Aquí podrías redirigir a una página de error o mostrar un mensaje de error en la misma página
            }
        } else {
            // Si no se ha enviado el formulario, redirigir a otra página o mostrar un mensaje de error
            echo "Error: El formulario no se ha enviado correctamente.";
        }
    }


    }
?>
