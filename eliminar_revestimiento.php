<!-- SCRIPT PHP PARA EL CORRECTO FUNCIONAMIENTO DEL CRUD DE REVESTIMIENTOS -->
<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['id_usuario'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: index.php');
    exit;
}

// Obtener el id por el método get
$id_revestimiento = $_GET['id'];

// Consulta para eliminar el revestimiento
$sql = "DELETE FROM revestimientos WHERE id_revestimiento = $id_revestimiento";
$resultado = mysqli_query($conn, $sql);

// Verificar si se eliminó correctamente
if ($resultado) {
    header('Location: crud_revestimientos.php');
    exit;
} else {
    echo "Error al eliminar el revestimiento";
    exit;
}
