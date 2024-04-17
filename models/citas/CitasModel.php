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

    public function get_medicos(){
        $sql = "SELECT *, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompletoMedico FROM Medico";
        $resultado = $this->db->query($sql);
        $medicos = array();
        while($row = $resultado->fetch_assoc()){
            $medicos[] = $row;
        }
        return $medicos;
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
    public function get_medico_por_id_cita($id_cita){
        $sql = "SELECT m.ID_Medico, CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico 
                FROM Medico m 
                INNER JOIN Citas c ON c.ID_Medico = m.ID_Medico 
                WHERE c.ID_Cita = $id_cita";
        $medicos = $this->db->query($sql);
        $row = $medicos->fetch_assoc();
        return $row;
    }

    
    
    public function obtener_paciente_por_id_cita($id_cita){
        $sql = "SELECT p.ID_Paciente, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS NombreCompletoPaciente 
                FROM Paciente p 
                INNER JOIN Citas c ON c.ID_Paciente = p.ID_Paciente 
                WHERE c.ID_Cita = $id_cita";
        $pacientes = $this->db->query($sql);
        $row = $pacientes->fetch_assoc();
        return $row;
    }
    

    public function obtener_datos_cita_por_id($idCita) {
        $sql = "SELECT * FROM citas WHERE ID_Cita = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idCita);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado->fetch_assoc();
        $stmt->close();
        return $row;
    }
    
    public function obtener_estados_cita($idCita) {
        $sql = "SELECT Estado FROM citas WHERE ID_Cita = $idCita";
        $resultado = $this->db->query($sql);
        $estado_actual = $resultado->fetch_assoc()['Estado'];

        $sql_todos = "SELECT DISTINCT Estado FROM citas";
        $resultado_todos = $this->db->query($sql_todos);
        $estados_disponibles = array();
        while ($row = $resultado_todos->fetch_assoc()) {
            $estados_disponibles[] = $row['Estado'];
        }

        return array('estado_actual' => $estado_actual, 'estados_disponibles' => $estados_disponibles);
    }

    public function obtener_lista_pacientes() {
        $sql = "SELECT ID_Paciente, Nombre, ApellidoPaterno, ApellidoMaterno FROM Paciente";
        $result = $this->db->query($sql);
    
        $lista_pacientes = array();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lista_pacientes[] = $row;
            }
        }
    
        return $lista_pacientes;
    }
    
    public function actualizarCita($idCita, $idPaciente, $idMedico, $fecha, $hora, $estado, $motivo) {
        // Escapar los valores para evitar inyección SQL (puedes usar mysqli_real_escape_string o prepared statements)
        $idCita = $this->db->real_escape_string($idCita);
        $idPaciente = $this->db->real_escape_string($idPaciente);
        $idMedico = $this->db->real_escape_string($idMedico);
        $fecha = $this->db->real_escape_string($fecha);
        $hora = $this->db->real_escape_string($hora);
        $estado = $this->db->real_escape_string($estado);
        $motivo = $this->db->real_escape_string($motivo);
    
        // Construir la consulta SQL para actualizar la cita
        $sql = "UPDATE citas SET ID_Paciente = '$idPaciente', ID_Medico = '$idMedico', Fecha = '$fecha', Hora = '$hora', Estado = '$estado', Motivo = '$motivo' WHERE ID_Cita = '$idCita'";
    
        // Ejecutar la consulta SQL
        $resultado = $this->db->query($sql);
    
        // Verificar si la consulta se ejecutó correctamente
        if ($resultado) {
            // La actualización se realizó correctamente
            return true;
        } else {
            // Hubo un error al actualizar la cita
            return false;
        }
    }
    
    public function eliminar_cita($idCita) {
        $sql = "DELETE FROM citas WHERE ID_Cita = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idCita);
        $eliminado = $stmt->execute();
        $stmt->close();
        return $eliminado;
    }
    
    public function verificar_existencia_cita($idPaciente, $fecha, $hora) {
        // Preparar la consulta SQL para verificar la existencia de una cita en la misma fecha y hora
        $sql = "SELECT COUNT(*) AS num_citas FROM citas WHERE ID_Paciente = ? AND Fecha = ? AND Hora = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iss", $idPaciente, $fecha, $hora);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado->fetch_assoc();
    
        // Devolver verdadero si existe al menos una cita, falso en caso contrario
        return $row["num_citas"] > 0;
    }
    
}

?>