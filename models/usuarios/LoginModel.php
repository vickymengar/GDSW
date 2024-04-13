<?php

class Usuarios_model {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUsuario($usuario, $contrasena) {
        // Preparar la consulta SQL para buscar el usuario por nombre y contraseña
        $sql = "SELECT * FROM usuarios WHERE Usuario = ? AND Contrasena = ?";
        
        // Preparar la declaración y ejecutar la consulta
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $usuario, $contrasena); // "ss" indica que los valores son strings
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
