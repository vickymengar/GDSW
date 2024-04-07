<?php
// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btningresar"])) {
    // Verifica si los campos de usuario y contraseña no están vacíos
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
        // Incluye el archivo de conexión a la base de datos
        include "../modelos/BD/conexion.php";

        // Limpia los datos del usuario y la contraseña para prevenir inyección de SQL
        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["password"]);

        // Prepara la consulta utilizando sentencias preparadas para prevenir la inyección de SQL
        $sql = "SELECT * FROM usuarios WHERE Usuario = :usuario AND Contrasena = :password";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica si se encontró un usuario con las credenciales proporcionadas
        if ($result) {
            // Inicio de sesión exitoso, redirige al usuario a la página de inicio
            header("Location: index.html");
            exit(); // Importante para prevenir que el script siga ejecutándose
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