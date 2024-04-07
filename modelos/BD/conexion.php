<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto si tu servidor de base de datos no está en localhost
$usuario = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$base_de_datos = "AIVI"; // Cambia esto por el nombre de tu base de datos

// Intentar establecer la conexión
try {
    // Se crea una conexión PDO
    $conexion = new PDO("mysql:host=$host;dbname=$base_de_datos", $usuario, $password);

    // Configuración de PDO para errores y excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configuración de PDO para utilizar caracteres UTF-8
    $conexion->exec("SET NAMES utf8");
    
    // Mensaje de conexión exitosa
   // echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // En caso de error, mostrar el mensaje de error
   // echo "Error de conexión: " . $e->getMessage();
    // Detener la ejecución del script
    exit();
}
?>
