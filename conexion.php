<!--APERTURA DEL SCRIPT DE PHP-->
<?php
$host_name = "localhost";
$user_name = "root";
$password = ""; //COLOCAR 1234 DE CONTRASEÑA
$database = "materiales_construccion_db";

// Crea la conexión
$conn = new mysqli($host_name, $user_name, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    // Si la conexión falla, muestra un mensaje de error y termina la ejecución del script
    die("Conexión fallida: " . $conn->connect_error);
}