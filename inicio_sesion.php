<!-- SCRIP PHP PARA INICIO DE SESION -->
<?php

// Importar el archivo de conexión a la base de datos
include 'conexion.php';

// Asignar los valores del formulario a nuestras variables
$nombre_usuario = mysqli_real_escape_string($conn, $_POST['nombre_usuario']);
$contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);

// Preparar la consulta SQL y ejecutarla
$sql = "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario'";
$result = mysqli_query($conn, $sql);

// Comprobar si se ha encontrado exactamente un resultado (un usuario con el nombre de usuario proporcionado)
if (mysqli_num_rows($result) == 1) {
    // Obtener la fila de resultados como un array asociativo
    $row = mysqli_fetch_assoc($result);
    // Comprobar si la contraseña proporcionada coincide con la contraseña almacenada en la base de datos
    if ($contrasena === $row['contrasena']) {
        // Iniciar una sesión
        session_start();
        // Almacenar el id del usuario en una variable de sesión
        $_SESSION['id_usuario'] = $row['id_usuario'];
        // Almacenar el nombre del usuario en una variable de sesión
        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
        // Redirigir al usuario a la página principal
        
        header("Location: index.php");
        // Terminar la ejecución del script
        exit();
    } else {
        // Establecer un mensaje de error si la contraseña es incorrecta
        $error = "La contraseña es incorrecta.";
    }
} else {
    // Establecer un mensaje de error si no se encuentra una cuenta con el nombre de usuario proporcionado
    $error = "No se encontró una cuenta con ese nombre de usuario.";
}
// Cerrar la conexión a la base de datos
mysqli_close($conn);