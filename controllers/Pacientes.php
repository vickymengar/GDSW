<?php

    class PacientesController {

        public function index() {

            require_once "models/pacientes/PacientesModel.php";
            $pacientes = new Pacientes_model();
            $data["titulo"] = "Pacientes";
            $data["pacientes"] = $pacientes->get_pacientes();

            require_once "views/Pacientes1.php";
        }
    }

?>