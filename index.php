<!-- SCRIPT PHP PARA LA VALIDACIÓN DEL INICIO DE SESIÓN -->
<?php
// Incluye el archivo de conexión a la base de datos
include 'conexion.php';

// Inicia una nueva sesión o reanuda la sesión existente
session_start();

// Inicializa una variable para almacenar errores
$error = null;

// Compruebo si se envío algo por el método POST (En este caso los datos del LogIn)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo que maneja el inicio de sesión
    include 'inicio_sesion.php';
}
?>

<!-- CREACIÓN DE LA PARTE VISUAL DEL INICIO CON HTML5 Y BOOTSTRAP 5 -->
<!-- CREACIÓN DE LA PARTE VISUAL DEL INICIO CON HTML5 Y BOOTSTRAP 5 -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Yisel Verónica Pajoy Maca y Jhon Eduar Perafan">
        <meta name="description" content="CRUD de materiales para la asignatura Modelamiento de bases de datos">
        <title>CRUD DE MATERIALES - INICIO</title>
        <!-- HOJAS DE ESTILO DE BOOTSTRAP 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- ICONOS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
        .imagen {
                background-image: url('Fondo.png'); /* Reemplaza con la ruta de tu imagen */
                background-size: cover;
                background-position: center;
                height: 100vh;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <?php if (!isset($_SESSION['id_usuario'])) :?>
            <div class="row vh-100">
                <div class="col-md-7 imagen"></div>
                    <div class="col-md-5 d-flex align-items-center text-center" style="width: 30%;">
                    <!-- Mostrar formulario de inicio de sesión si el usuario no ha iniciado sesión -->
                    <div class="container mt-5">
                        <h1>Iniciar Sesión</h1>
                        <?php if ($error) :?>
                            <!-- Mostrar mensaje de error si hay uno -->
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error;?>
                            </div>
                        <?php endif;?>
                        <br>
                        <!-- Formulario de inicio de sesión -->
                        <form method="POST" action="index.php">
                            <div class="form-group">
                                <label for="nombre_usuario">Nombre de usuario</label>
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <br>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-success mr-2">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php else : ?>
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
                    <div id="home" class="mt-4">
                    <!-- Mensaje de bienvenida -->
                    <div class="alert alert-success" role="alert">
                        Hola, <?php echo $_SESSION['nombre_usuario']; ?>. Has iniciado sesión correctamente.
                    </div>
                </div>
                </div>
            <?php endif ; ?>
            </div>
        </div>
        <!-- JS DE BOOTSTRAP 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- ICONOS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    </body>

</html>