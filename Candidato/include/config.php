<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "agoratalent";

try {
    // Crear una nueva instancia de PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la tabla si no existe
    $sql = "CREATE TABLE IF NOT EXISTS usuario (
        id_usuario INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        correo VARCHAR(30),
        pass VARCHAR(30),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);

} catch(PDOException $e) {
    // Manejar errores de conexión o consulta
    echo "Error: " . $e->getMessage();
    die(); // Detener la ejecución del script en caso de error
}
$conn = null;
?>
