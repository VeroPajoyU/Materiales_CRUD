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

// FUNCION PARA OBTENER LOS DATOS DE LOS REVESTIMIENTOS
function obtenerRevestimiento($conn)
{
    // Consulta para obtener los datos de los revestimientos
    $sql = "SELECT * FROM revestimientos";
    return mysqli_query($conn, $sql);
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
    <title>REVESTIMIENTOS</title>
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
                            <a class="nav-link" href="#">Porcelanas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="crud_revestimientos.php">Revestimientos</a>
                        </li>
                    </ul>
                    <section class="d-flex justify-content-end">
                        <a href="cerrar_sesion.php" class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Salir
                        </a>
                    </section>
                </div>
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
            // Obtener los datos de los revestimientos
            $revestimientos = obtenerRevestimiento($conn);
            // Valido si llegan datos
            if (mysqli_num_rows($revestimientos) > 0) :
            ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Revestimiento</th>
                            <th>Tipo</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Iterar sobre los pedidos y mostrarlos en la tabla -->
                        <?php while ($revestimiento = mysqli_fetch_assoc($revestimientos)) : ?>
                            <tr>
                                <td><?php echo $revestimiento['id_revestimiento']; ?></td>
                                <td><?php echo $revestimiento['nombre_revestimiento']; ?></td>
                                <td><?php echo $revestimiento['tipo']; ?></td>
                                <td><?php echo $revestimiento['precio']; ?></td>
                                <td>
                                    <a href="ver_pedido.php?id=<?php echo $revestimiento['id_revestimiento']; ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a href="editar_pedido.php?id=<?php echo $revestimiento['id_revestimiento']; ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="eliminar_pedido.php?id=<?php echo $revestimiento['id_revestimiento']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este revestimiento?');">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
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