<?php
class RegistroRController {

    public function index() {

        require_once "models/recetas/recetasModel.php";
        $model = new Receta_model();
        $medicos = $model->get_medicos(); // Obtener lista de médicos
        require_once "views/Registroreceta.php";
    }
}
?>
