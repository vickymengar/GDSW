<?php
class CitasController {

    public function index() {

        require_once "models/citas/CitasModel.php";
        $citas_model = new Citas_model();
        $citas["citas"] = $citas_model->get_citas();

        require_once "views/citas.php";
    }

    public function eliminarCita() {
        // Verificar si se ha proporcionado un ID de cita
        if(isset($_POST['id_cita'])) {
            // Obtener el ID de la cita desde el formulario
            $idCita = $_POST['id_cita'];
            
            // Instanciar el modelo de citas
            require_once "models/citas/CitasModel.php";
            $citas_model = new Citas_model();
            
            // Intentar eliminar la cita
            $eliminado = $citas_model->eliminar_cita($idCita);
            
            // Verificar si se eliminó correctamente
            if($eliminado) {
                // Redirigir a la página de citas
                header("Location: index.php?c=Citas&a=index");
                exit();
            } else {
                // Manejar el error de eliminación
                echo "Error al intentar eliminar la cita.";
            }
        } else {
            // Manejar el error de falta de ID de cita
            echo "No se proporcionó un ID de cita para eliminar.";
        }
    }
    
}
?>
