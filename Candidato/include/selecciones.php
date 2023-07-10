<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "agoratalent";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Realizar una consulta SELECT para obtener los registros de la tabla "usuario"
    $sql = "SELECT * FROM usuario";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si se obtuvieron resultados
    if ($result) {
        foreach ($result as $row) {
            // Acceder a los campos individuales del registro
            $id = $row['id_usuario'];
            $correo = $row['correo'];
            $pass = $row['pass'];

            // Imprimir los datos del candidato
            echo "ID: $id<br>";
            echo "Correo: $correo<br>";
            echo "Contraseña: $pass<br>";
            echo "<br>";
        }
    } else {
        echo "No se encontraron registros en la tabla 'usuario'.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
