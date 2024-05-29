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

// Función para obtener los datos del revestimiento por la id
function obtener_revestimiento($conn, $id_revestimiento)
{
    //Consulta para obtener los datos del revestimiento
    $sql = "SELECT * FROM revestimientos WHERE id_revestimiento = $id_revestimiento";
    $resultado = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($resultado);
}
?>

<!-- CREACIÓN DE LA PARTE VISUAL DEL CRUD DE REVESTIMIENTOS CON HTML5 Y BOOTSTRAP 5 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Yisel Verónica Pajoy Maca y Jhon Eduar Perafan">
    <meta name="description" content="CRUD de materiales para la asignatura Modelamiento de bases de datos">
    <title>VER REVESTIMIENTO</title>
    <!-- HOJAS DE ESTILO DE BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </a>
                </section>
            </div>
        </nav>
        <div class="mt-4">
            <section class="d-flex justify-content-center">
                <h1><strong>Revestimientos</strong></h1>
            </section>
            <section class="d-flex justify-content-end">
                <a href="agregar_revestimiento.php" class="btn btn-success">
                    <i class="fas fa-plus"></i> Agregar Revestimiento
                </a>
            </section>
        </div>
        <div class="mt-4">
            <?php
            // Obtener el id por el método get
            $id_revestimiento = $_GET['id'];
            // Obtener los datos de los revestimientos
            $revestimiento = obtener_revestimiento($conn, $id_revestimiento);
            // Valido si llegan datos
            if ($revestimiento) :
            ?>
                <h2><strong>Detalles del Revestimiento</strong></h2>
                <table class="table table-bordered">
                    <tr>
                        <th>ID del Revestimiento</th>
                        <td><?php echo $revestimiento['id_revestimiento']; ?></td>
                    </tr>
                    <tr>
                        <th>Nombre del Revestimiento</th>
                        <td><?php echo $revestimiento['nombre_revestimiento']; ?></td>
                    </tr>
                    <tr>
                        <th>Tipo</th>
                        <td><?php echo $revestimiento['tipo']; ?></td>
                    </tr>
                    <tr>
                        <th>Precio</th>
                        <td><?php echo $revestimiento['precio']; ?></td>
                    </tr>
                </table>
                <a href="crud_revestimientos.php" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Volver a Revestimientos
                </a>
            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    No se encontraron datos.
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- JS DE BOOTSTRAP 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- ICONOS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>

</html>