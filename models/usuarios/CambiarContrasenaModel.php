<?php
class CambiarC_model {
    private $db;
    private $contrasena;
    public function __construct() {
        // Si se proporciona una conexión, se establece en la propiedad $db
        $this->db = Conectar::conexion();
        
    }

    public function getUsuarioByEmail($correo) {
        // Preparar la consulta SQL para buscar el usuario por correo electrónico
        $sql = "SELECT * FROM usuarios WHERE CorreoElectronico = ?";
        
        // Preparar la declaración y ejecutar la consulta
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $correo); // "s" indica que el valor es un string
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Verificar si se encontró algún usuario
        if ($result->num_rows > 0) {
            // Obtener los datos del usuario como un array asociativo
            $usuario = $result->fetch_assoc();
        } else {
            $usuario = null;
        }
        
        $stmt->close();
        return $usuario;
    }
    
}
?>
