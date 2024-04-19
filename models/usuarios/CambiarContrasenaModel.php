<?php
class CambiarContrasenaModel {
    private $db;

    public function __construct($conexion = null) {
        // Si se proporciona una conexión, se establece en la propiedad $db
        if ($conexion !== null) {
            $this->db = $conexion;
        }
    }

    public function getUsuarioByEmail($correo) {
        // Preparar la consulta SQL para buscar el usuario por correo electrónico
        $sql = "SELECT * FROM usuarios WHERE Correo = ?";
        
        // Preparar la declaración y ejecutar la consulta
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $correo); // "s" indica que el valor es un string
        $stmt->execute();
        
        // Obtener el resultado de la consulta
        $result = $stmt->get_result();
        
        // Comprobar si se encontró algún usuario
        if ($result->num_rows > 0) {
            // Devolver los datos del usuario
            return $result->fetch_assoc();
        } else {
            // Si no se encontró ningún usuario, devolver null
            return null;
        }
    }
}
?>
