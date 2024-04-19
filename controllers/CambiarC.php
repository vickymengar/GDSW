<?php
class CambiarCController {
    private $usuarios_model;

    public function index() {
        if(isset($_POST['correo'])){
            // Inicializar el modelo de cambio de contraseña
            $this->usuarios_model = new CambiarContrasenaModel();

            // Obtener la contraseña del usuario usando el correo electrónico
            $usuario = $this->usuarios_model->getUsuarioByEmail($_POST['correo']);

            if ($usuario) {
                // Mostrar la contraseña en un cuadro de diálogo
                echo "<script>alert('Tu contraseña es: " . $usuario['Contrasena'] . "');</script>";
            } else {
                echo "<script>alert('No se encontró ningún usuario con ese correo electrónico');</script>";
            }
        }

        require_once "views/CambiarContrasena.php";
    }
}
?>
