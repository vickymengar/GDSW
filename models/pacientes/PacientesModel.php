<?php

class Pacientes_model {

    private $db;
    private $pacientes;
    private $medicos;

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
    
    public function get_medicos(){
        $sql = "SELECT *, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompletoMedico FROM Medico";
        $resultado = $this->db->query($sql);
        $medicos = array();
        while($row = $resultado->fetch_assoc()){
            $medicos[] = $row;
        }
        return $medicos;
    }
    
    

    public function registrar_paciente($nombre, $apellidoPaterno, $apellidoMaterno, $edad, $idMedico){
        // Preparar la consulta SQL
        $sql = "INSERT INTO Paciente (Nombre, ApellidoPaterno, ApellidoMaterno, Edad, ID_Medico) 
                VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', $edad, $idMedico)";
        
        // Ejecutar la consulta
        if ($this->db->query($sql) === TRUE) {
            return true; // Registro exitoso
        } else {
            return false; // Error al registrar
        }

    }

}