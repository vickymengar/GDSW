<?php

require_once 'models/usuarios/CambiarContrasenaModel.php';

class CambiarCController {
   
    private $usuarios_model;
    
    public function __construct() {
        $this->usuarios_model = new CambiarC_model();
    }
    
    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_STRING);
            
            // Verificar si el correo está presente y no está vacío
            if (!empty($correo)) {
                // Obtener la contraseña del usuario usando el correo electrónico
                $usuario = $this->usuarios_model->getUsuarioByEmail($correo);

                if ($usuario) {
                    // Mostrar la contraseña en un cuadro de diálogo
                    echo "<script>alert('Tu contraseña es: " . $usuario['Contrasena'] . "');</script>";
                } else {
                    echo "<script>alert('No se encontró ningún usuario con ese correo electrónico');</script>";
                }
            } else {
                echo "<script>alert('Por favor ingresa un correo electrónico');</script>";
            }
        }
        
        // Cargar la vista correspondiente
        require_once "views/CambiarContrasena.php";
    }
}

?>
