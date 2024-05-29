<?php
    // Incluir la conexión a la base de datos
    include 'conexion.php';

    // Verificar si el usuario ha iniciado sesión
    session_start();
    if (!isset($_SESSION['id_usuario'])){
        // Si no ha iniciado sesión, redirigir a la página de iniciio de sesión
        header('Location: index.php');
        exit;
    }

    // FUNCIÓN PARA OBTENER LOS DATOS DE LAS PORCELANAS
    function obtener_porcelana($conn)
    {
        // Consulta para obtener los datos de las porcelanas
        $sql = "SELECT * FROM porcelana_sanitaria";
        return mysqli_query($conn, $sql);
    }
?>

<!-- CREACIÓN DE LA PARTE VISUAL DEL CRUD DE PORCELANAS CON HTML5 Y BOOTSTRAP 5 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Yisel Verónica Pajoy Maca y Jhon Eduar Perafan">
    <meta name="description" content="CRUD de materiales para la asignatura Modelamiento de bases de datos">
    <title>PORCELANAS</title>
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
                <h1><strong>Porcelanas</strong></h1>
            </section>
            <section class="d-flex justify-content-end">
                <a href="agregar_porcelana.php" class="btn btn-success">
                    <i class="fas fa-plus"></i> Agregar Porcelana
                </a>
            </section>
        </div>
        <div class="mt-4">
            <?php
                // Obtener los datos de porcelanas
                $porcelanas = obtener_porcelana($conn);
                // Validar si llegan datos
                if (mysqli_num_rows($porcelanas) > 0):
            ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la Porcelana</th>
                        <th>Tipop</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Iterar sobre los porcelana y mostrarlos en la tabla -->
                    <?php while ($porcelana = mysqli_fetch_assoc($porcelanas)): ?>
                        <tr>
                            <td><?php echo $porcelana['id_porcelana']; ?></td>
                            <td><?php echo $porcelana['nombre_porcelana']; ?></td>
                            <td><?php echo $porcelana['tipo']; ?></td>
                            <td><?php echo $porcelana['precio']; ?></td>
                            <td>
                                <a href="ver_porcelana.php?id=<?php echo $porcelana['id_porcelana']; ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                <a href="editar_porcelana.php?id=<?php echo $porcelana['id_porcelana']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="eliminar_porcelana.php?id=<?php echo $porcelana['id_porcelana']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta porcelana?');">
                                    <i class="fas fa-trash"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>No hay registros</p>
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