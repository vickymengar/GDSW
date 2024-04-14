<?php

class Pacientes_model {

    private $db;
    private $pacientes;

    public function __construct() {
        $this->db = Conectar::conexion();
        $this->pacientes = array();
    }

    public function get_pacientes(){
        $sql = "SELECT p.*, CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico 
                FROM Paciente p 
                LEFT JOIN Medico m ON p.ID_Medico = m.ID_Medico";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc()){
            $this->pacientes[] = $row;
        }
        return $this->pacientes;
    }
    
    


}