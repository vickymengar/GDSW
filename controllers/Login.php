<?php
require_once 'models/usuarios/LoginModel.php';

class LoginController {
    private $usuarios_model;
    private $db;

    public function __construct($db) {
        // Guarda la conexión a la base de datos en una propiedad
        $this->db = $db;
         // Inicializar el modelo de usuarios pasando la conexión a la base de datos
         $this->usuarios_model = new Usuarios_model($this->db);
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
            $contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);

            if (!empty($usuario) && !empty($contrasena)) {
                $usuario_valido = $this->usuarios_model->getUsuario($usuario, $contrasena);
                if ($usuario_valido) {
                    session_start();
                    $_SESSION["ID_Usuario"] = $usuario;
                    // Construir la URL del panel principal
                    $panel_url = 'index.php?c=Panel&a=index';
                    // Redirigir al usuario al panel principal
                    header("Location: $panel_url");
                    exit;
                } else {
                    $error = "Usuario o contraseña incorrectos.";
                }
            } else {
                $error = "Por favor ingrese tanto el usuario como la contraseña.";
            }
        }

        require_once "views/LoginView/Login.php";
    }
}


?>
