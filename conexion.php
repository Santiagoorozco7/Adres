<?php
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en otro lugar
$username = "root";
$password = "";
$database = "adres";

// Función para obtener la conexión a la base de datos
function getConexion() {
    global $servername, $username, $password, $database;
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}
?>
