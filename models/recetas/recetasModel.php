<?php

class Receta_model {
    private $db;
    private $recetas;

    public function __construct() {
        $this->db = Conectar::conexion();
        $this->recetas = array();
    }

    public function get_recetas() {
        $sql = "SELECT r.*, 
                CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS NombreCompletoPaciente,
                CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico,
                p.Edad
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


    
    public function obtener_edad_paciente_por_id($idPaciente) {
        $sql = "SELECT Edad FROM Paciente WHERE ID_Paciente = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idPaciente);
        $stmt->execute();
        $stmt->bind_result($edad);
        $stmt->fetch();
        $stmt->close();
        return $edad;
    }

    public function obtener_cedula_doctor_por_id($idMedico) {
        $sql = "SELECT CedulaProfesional FROM Medico WHERE ID_Medico = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idMedico);
        $stmt->execute();
        $stmt->bind_result($cedulaProfesional);
        $stmt->fetch();
        $stmt->close();
        return $cedulaProfesional;
    }
    
    public function get_pacientes() {
        $sql = "SELECT *, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompletoPaciente FROM Paciente";
        $resultado = $this->db->query($sql);
        $pacientes = array();
        while($row = $resultado->fetch_assoc()){
            $pacientes[] = $row;
        }
        return $pacientes;
    }
    
    public function insertar_receta($idPaciente, $idMedico, $fecha, $peso, $temperatura, $talla, $tensionArterial, $so2, $diagnostico, $receta) {
        // Preparar la consulta SQL para insertar la receta
        $sql = "INSERT INTO receta (ID_Paciente, ID_Medico, FechaCreacion, Peso, Temperatura, Talla, TensionArterial, SO2, Dx, Receta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Preparar la declaración SQL
        $stmt = $this->db->prepare($sql);
        
        // Verificar si la preparación de la declaración SQL fue exitosa
        if ($stmt) {
            // Vincular los parámetros con los valores
            $stmt->bind_param("iisdddddss", $idPaciente, $idMedico, $fecha, $peso, $temperatura, $talla, $tensionArterial, $so2, $diagnostico, $receta);
            
            // Ejecutar la consulta
            $resultado = $stmt->execute();
            
            // Verificar si la ejecución de la consulta fue exitosa
            if ($resultado) {
                // La receta se insertó correctamente
                return true;
            } else {
                // Hubo un error al insertar la receta
                return false;
            }
        } else {
            // Hubo un error al preparar la declaración SQL
            return false;
        }
    }
    
    public function obtener_datos_receta_por_id($idReceta) {
        $sql = "SELECT * FROM receta WHERE ID_Receta = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idReceta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $row = $resultado->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function obtener_lista_pacientes() {
        $sql = "SELECT ID_Paciente, CONCAT(Nombre, ' ', ApellidoPaterno, ' ', ApellidoMaterno) AS NombreCompletoPaciente FROM Paciente";
        $result = $this->db->query($sql);
    
        $lista_pacientes = array();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lista_pacientes[] = $row;
            }
        }
    
        return $lista_pacientes;
    }
   
    public function obtener_paciente_por_id_receta($id_receta){
        $sql = "SELECT p.ID_Paciente, CONCAT(p.Nombre, ' ', p.ApellidoPaterno, ' ', p.ApellidoMaterno) AS NombreCompletoPaciente 
                FROM Paciente p 
                INNER JOIN Receta r ON r.ID_Paciente = p.ID_Paciente 
                WHERE r.ID_Receta = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_receta);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function obtener_medico_por_id_receta($id_receta){
        $sql = "SELECT m.ID_Medico, CONCAT(m.Nombre, ' ', m.ApellidoPaterno, ' ', m.ApellidoMaterno) AS NombreCompletoMedico 
                FROM medico m 
                INNER JOIN receta r ON r.ID_Medico = m.ID_Medico 
                WHERE r.ID_Receta = $id_receta";
        $medicos = $this->db->query($sql);
        $row = $medicos->fetch_assoc();
        return $row;
    }
    
    public function actualizarReceta($idCita, $idPaciente, $idMedico, $fecha, $peso, $temperatura, $talla, $tensionArterial, $so2, $diagnostico, $receta) {
        // Preparar la consulta SQL
        $sql = "UPDATE receta SET ID_Paciente=?, ID_Medico=?, FechaCreacion=?, Peso=?, Temperatura=?, Talla=?, TensionArterial=?, SO2=?, Dx=?, Receta=? WHERE ID_Receta=?";
        
        // Preparar la sentencia
        $stmt = $this->db->prepare($sql);
        
        // Vincular los parámetros
        $stmt->bind_param("iissssssssi", $idPaciente, $idMedico, $fecha, $peso, $temperatura, $talla, $tensionArterial, $so2, $diagnostico, $receta, $idCita);
        
        // Ejecutar la sentencia
        $resultado = $stmt->execute();
        
        // Verificar si la actualización fue exitosa
        if ($resultado) {
            // La actualización fue exitosa
            return true;
        } else {
            // Hubo un error en la actualización
            return false;
        }
        
        // Cerrar la sentencia
        $stmt->close();
    }
    
    public function eliminarReceta($idReceta) {
        // Query SQL para eliminar la receta por su ID
        $sql = "DELETE FROM receta WHERE ID_Receta = ?";
        
        // Preparar la consulta
        $stmt = $this->db->prepare($sql);
        
        // Vincular el parámetro ID de receta
        $stmt->bind_param("i", $idReceta);
        
        // Ejecutar la consulta
        $eliminado = $stmt->execute();
        
        // Verificar si la receta fue eliminada correctamente
        if($eliminado) {
            // Devolver verdadero si la eliminación fue exitosa
            return true;
        } else {
            // Devolver falso si hubo algún error en la eliminación
            return false;
        }
        
        // Cerrar la consulta
        $stmt->close();
    }
    

}

?>
