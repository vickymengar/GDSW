<?php
class CitasController {

    public function index() {

        require_once "models/citas/CitasModel.php";
        $citas_model = new Citas_model();
        $citas["citas"] = $citas_model->get_citas();

        require_once "views/citas.php";
    }
}
?>
