<?php


class Citas_model {

    private $db;
    private $citas;

    public function __construct() {
        $this->db = Conectar::conexion();
        $this->citas = array();
    }

    public function get_citas(){
        $sql = "SELECT c.*, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS NombreCompletoPaciente,
                CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico
                FROM citas c
                INNER JOIN Paciente p ON c.ID_Paciente = p.ID_Paciente
                INNER JOIN Medico m ON c.ID_Medico = m.ID_Medico";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc()){
            $this->citas[] = $row;
        }
        return $this->citas;
    }
}

?>