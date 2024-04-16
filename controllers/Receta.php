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

    /*public function detalle() {
        // Verificar si se ha proporcionado el ID de la receta
        if (isset($_GET['id'])) {
            // Obtener el ID de la receta desde la URL
            $idReceta = $_GET['id'];

            // Crear una instancia del modelo de recetas
            $receta_model = new Receta_model();

            // Obtener la receta por su ID desde el modelo
            $receta = $receta_model->obtener_receta_por_id($idReceta);

            // Verificar si se encontró la receta
            if ($receta) {
                // Incluir la vista del detalle de la receta y pasar los datos necesarios
                require_once 'views/receta_detalle.php';
            } else {
                // Mostrar un mensaje de error si no se encontró la receta
                echo "No se encontró la receta.";
            }
        } else {
            // Mostrar un mensaje de error si no se proporcionó el ID de la receta
            echo "Se requiere proporcionar el ID de la receta.";
        }
    }
*/
    // Otros métodos para insertar, actualizar, eliminar recetas, etc.
}

?>
