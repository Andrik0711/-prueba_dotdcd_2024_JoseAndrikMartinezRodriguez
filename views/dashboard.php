<?php
require '../controller/session.php';
sesionStart();

$user_name = $_SESSION['user_name'];
$user_type = $_SESSION['user_type'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Bienvenido, <?php echo htmlspecialchars($user_name); ?>!</h1>
                <p class="text-center">Rol: <?php echo htmlspecialchars($user_type); ?></p>
                <div class="text-center mt-4">
                    <a href="../controller/logout.php" class="btn btn-danger">Cerrar Sesión</a>
                </div>

            </div>
        </div>
        <!-- Rol de admin -->
        <div class="row mt-5">
            <?php if ($user_type == 'admin') : ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Administrar Empleados</h5>
                            <p class="card-text">Gestiona la lista de empleados.</p>
                            <a href="index.php" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>
                <!-- Rol de empleados -->
            <?php elseif ($user_type == 'employee') : ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mi Información</h5>
                            <p class="card-text">Visualiza y actualiza tu información personal.</p>
                            <a href="index.php" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>
                <!-- Rol Ejec de ventas -->
            <?php elseif ($user_type == 'sales_executive') : ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Gestión de Ventas</h5>
                            <p class="card-text">Gestiona tus ventas y visualiza el rendimiento.</p>
                            <a href="index.php" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            swal({
                title: "¡Buen trabajo!",
                text: "Registro exitoso!",
                icon: "success",
                button: "OK",
            });
        } else if (urlParams.has('error')) {
            swal({
                title: "¡Error!",
                text: "Hubo un problema con el registro.",
                icon: "error",
                button: "OK",
            });
        }
    });
</script>

</html>