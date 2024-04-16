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

    public function obtener_paciente_por_id($idPaciente) {
        $sql = "SELECT p.*, CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico 
                FROM Paciente p 
                LEFT JOIN Medico m ON p.ID_Medico = m.ID_Medico 
                WHERE p.ID_Paciente = $idPaciente";
        $resultado = $this->db->query($sql);
        $paciente = $resultado->fetch_assoc();
        return $paciente;
    }
    
    public function get_medico_por_id_paciente($id_paciente){
        $sql = "SELECT m.ID_Medico, CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico 
                FROM Medico m 
                INNER JOIN Paciente p ON p.ID_Medico = m.ID_Medico 
                WHERE p.ID_Paciente = $id_paciente";
        $medicos = $this->db->query($sql);
        $row = $medicos->fetch_assoc();
        return $row;
    }
    
    public function actualizar_paciente($idPaciente, $nombre, $apellidoPaterno, $apellidoMaterno, $edad, $idMedico){
        // Preparar la consulta SQL para actualizar los detalles del paciente
        $sql = "UPDATE Paciente 
                SET Nombre = '$nombre', 
                    ApellidoPaterno = '$apellidoPaterno', 
                    ApellidoMaterno = '$apellidoMaterno', 
                    Edad = $edad, 
                    ID_Medico = $idMedico
                WHERE ID_Paciente = $idPaciente";
        
        // Ejecutar la consulta
        if ($this->db->query($sql) === TRUE) {
            return true; // Actualización exitosa
        } else {
            return false; // Error al actualizar
        }
    }
    
    public function eliminar_paciente($id_paciente) {
        // Preparar la consulta SQL para eliminar al paciente por su ID
        $sql = "DELETE FROM Paciente WHERE ID_Paciente = $id_paciente";
        
        // Ejecutar la consulta
        if ($this->db->query($sql) === TRUE) {
            return true; // Eliminación exitosa
        } else {
            return false; // Error al eliminar
        }
    }
    

}