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

    public function get_nombres_medicos(){
        $nombres_medicos = array();
        $sql = "SELECT ID_Medico, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompletoMedico FROM Medico";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc()){
            $nombres_medicos[$row['ID_Medico']] = $row['NombreCompletoMedico'];
        }
        return $nombres_medicos;
    }

    public function get_estados_disponibles() {
        // Consulta para obtener los posibles valores del campo estado desde la estructura de la tabla
        $sql = "SHOW COLUMNS FROM citas LIKE 'estado'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        // Extraer los valores del ENUM y eliminar los paréntesis
        $enum_values = explode("','", substr($row['Type'], 6, -2));
        return $enum_values;
    }

    public function get_id_pacientes() {
        $sql = "SELECT ID_Paciente FROM Paciente";
        $resultado = $this->db->query($sql);
        $ids = array();
        while ($row = $resultado->fetch_assoc()) {
            $ids[] = $row['ID_Paciente'];
        }
        return $ids;
    }

    public function obtener_nombre_paciente_por_id($idPaciente) {
        $sql = "SELECT CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompleto FROM Paciente WHERE ID_Paciente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idPaciente);
        $stmt->execute();
        $stmt->bind_result($nombreCompleto);
        $stmt->fetch();
        $stmt->close();
        return $nombreCompleto;
    }
    
    public function insertar_cita($idPaciente, $idMedico, $fecha, $hora, $estado, $motivo){
        $sql = "INSERT INTO citas (ID_Paciente, ID_Medico, Fecha, Hora, Estado, Motivo) 
                VALUES ('$idPaciente', '$idMedico', '$fecha', '$hora', '$estado', '$motivo')";
        $resultado = $this->db->query($sql);
        if ($resultado) {
            return true; // La cita se insertó correctamente
        } else {
            return false; // Hubo un error al insertar la cita
        }
    }

    public function obtener_medico_por_id_cita($idCita) {
        $sql = "SELECT m.ID_Medico, CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico
                FROM citas c
                INNER JOIN Medico m ON c.ID_Medico = m.ID_Medico
                WHERE c.ID_Cita = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idCita);
        $stmt->execute();
        $stmt->bind_result($idMedico, $nombreCompletoMedico);
        $stmt->fetch();
        $stmt->close();
        return array('ID_Medico' => $idMedico, 'NombreCompletoMedico' => $nombreCompletoMedico);
    }
    
    public function obtener_cita_por_id($idCita) {
        $sql = "SELECT * FROM citas WHERE ID_Cita = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idCita);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $cita = $resultado->fetch_assoc();
        $stmt->close();
        return $cita;
    }
    
    
}

?>