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

$error = null;
// Obtener el id por el método get
$id_porcelana = $_GET['id'];

// Identificación del porcelana a editar
function obtener_porcelana($conn, $id_porcelana)
{
    //Consulta para obtener los datos del porcelana
    $sql = "SELECT * FROM porcelana_sanitaria WHERE id_porcelana = $id_porcelana";
    $resultado = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($resultado);
}

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_porcelana = $_POST['nombre_porcelana'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];

    // Insertar los datos en la base de datos
    $sql = "UPDATE porcelana_sanitaria SET nombre_porcelana = '$nombre_porcelana', tipo = '$tipo', precio = $precio WHERE id_porcelana = $id_porcelana";
    $resultado = mysqli_query($conn, $sql);

    // Valido la edición del porcelana
    if ($resultado) {
        // Redirigir a la página de porcelanas
        header('Location: crud_porcelanas.php');
        exit;
    } else {
        // Mostrar un mensaje de error si no se pudo crear el porcelana
        $error = 'Algo salió mal al crear el porcelana';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PORCELANAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Gestión de Materiales de Construcción</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="crud_porcelanas.php">Porcelanas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="crud_revestimientos.php">Revestimientos</a>
                        </li>
                    </ul>
                </div>
                <section class="d-flex justify-content-end">
                    <a href="cerrar_sesion.php" class="btn btn-danger btn-sm">
                        <i>Salir</i>
                    </a>
                </section>
            </div>
        </nav>
        <div class="mt-4">
            <section class="d-flex justify-content-center">
                <h1><strong>Editar Porcelana</strong></h1>
            </section>
            <?php if ($error) : ?>
                <!-- Mostrar mensaje de error si hay uno -->
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <?php
            // Obtener los datos del porcelana
            $porcelana = obtener_porcelana($conn, $id_porcelana);
            ?>
            <hr>
            <form method="post">
                <div class="mb-3">
                    <label for="nombre_porcelana" class="form-label">Nombre del porcelana</label>
                    <input type="text" class="form-control" id="nombre_porcelana" name="nombre_porcelana" value="<?php echo htmlspecialchars($porcelana['nombre_porcelana']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo htmlspecialchars($porcelana['tipo']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($porcelana['precio']) ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Editar Porcelana</button>
                <a href="crud_porcelanas.php" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Volver a Porcelanas
                </a>
            </form>
        </div>
    </div>
</body>

</html>