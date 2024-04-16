<?php

class Receta_model {
    private $db;
    private $recetas;

    public function __construct() {
        $this->db = Conectar::conexion();
        $this->recetas = array();
    }

    public function get_recetas() {
        $sql = "SELECT r.*, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS NombreCompletoPaciente,
                CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico
                FROM receta r
                INNER JOIN paciente p ON r.ID_Paciente = p.ID_Paciente
                INNER JOIN medico m ON r.ID_Medico = m.ID_Medico";
        $resultado = $this->db->query($sql);
        $recetas = array(); // Crear un arreglo para almacenar las recetas
        while($row = $resultado->fetch_assoc()){
            $recetas[] = $row; // Agregar cada receta al arreglo
        }
        return $recetas; // Devolver el arreglo de recetas
    }
    
    public function get_medicos(){
        $sql = "SELECT *, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompletoMedico FROM Medico";
        $resultado = $this->db->query($sql);
        $medicos = array();
        while($row = $resultado->fetch_assoc()){
            $medicos[] = $row;
        }
        return $medicos;
    }
    

    // Otros métodos que puedas necesitar, como insertar, actualizar, eliminar, etc.
}

?>
