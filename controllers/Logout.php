<?php

class LogoutController {

    public function index() {
        // Iniciar sesión (si aún no está iniciada)
        session_start();

        // Destruir la sesión
        session_destroy();

        // Construir la URL del inicio de sesión
        $login_url = 'index.php?c=Login&a=index';

        // Redirigir al usuario al inicio de sesión
        header("Location: $login_url");
        exit;
    }
}

?>
