<?php

class RecetaController {
    public function index() {
        require_once "models/recetas/recetasModel.php";
        // Crear una instancia del modelo de recetas
        $recetas = new Receta_model();

        // Obtener todas las recetas desde el modelo
        $data["recetas"] = $recetas->get_recetas();

        // Incluir la vista de las recetas y pasar los datos necesarios
        require_once 'views/Receta.php';
    }

    public function eliminarReceta() {
        // Verificar si se ha proporcionado un ID de receta
        if(isset($_POST['id_receta'])) {
            // Obtener el ID de la receta desde el formulario
            $idReceta = $_POST['id_receta'];
            
            // Instanciar el modelo de recetas
            require_once "models/recetas/recetasModel.php";
            $recetaModel = new Receta_model();
            
            // Intentar eliminar la receta
            $eliminado = $recetaModel->eliminarReceta($idReceta);
            
            // Verificar si se eliminó correctamente
            if($eliminado) {
                // Redirigir a la página de recetas
                header("Location: index.php?c=Receta&a=index");
                exit();
            } else {
                // Manejar el error de eliminación
                echo "Error al intentar eliminar la receta.";
            }
        } else {
            // Manejar el error de falta de ID de receta
            echo "No se proporcionó un ID de receta para eliminar.";
        }
    }
    
    
}

?>
