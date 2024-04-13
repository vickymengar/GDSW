<?php

class Pacientes_model {

    private $db;
    private $pacientes;

    public function __construct() {
        $this->db = Conectar::conexion();
        $this->pacientes = array();
    }

    public function get_pacientes(){

        $sql = "SELECT * FROM paciente";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc()){
            $this->pacientes[] = $row;
        }
        return $this->pacientes;
    }

}