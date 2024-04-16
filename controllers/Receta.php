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

}

?>
