<?php
// Iniciar o reanudar una sesión
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btningresar"])) {
    // Verificar si los campos de usuario y contraseña no están vacíos
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
        // Incluir el archivo de conexión a la base de datos
        include "../config/Database.php";

        // Limpiar los datos del usuario y la contraseña para prevenir la inyección de SQL
        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["password"]);

        // Preparar la consulta utilizando sentencias preparadas para prevenir la inyección de SQL
        $sql = "SELECT * FROM usuarios WHERE Usuario = :usuario AND Contrasena = :password";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($result) {
            // Inicio de sesión exitoso, establecer variables de sesión
            $_SESSION["usuario"] = $usuario;
            $_SESSION["loggedin"] = true;

            // Redirigir al usuario a la página de inicio
            header("Location: panel.php");
            exit();
        } else {
            // No se encontró ningún usuario con las credenciales proporcionadas
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
    } else {
        // Uno o ambos campos están vacíos
        echo "<div class='alert alert-danger'>Por favor, rellena todos los campos</div>";
    }
}
?>
