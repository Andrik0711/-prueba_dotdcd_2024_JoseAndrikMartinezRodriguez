<?php
require '../controller/session.php';
sesionStart();

require '../controller/detail.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalles del Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Detalles del Empleado</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?php echo $employee['id']; ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?php echo $employee['name']; ?></td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td><?php echo $employee['phone']; ?></td>
            </tr>
            <tr>
                <th>Correo Electrónico</th>
                <td><?php echo $employee['email']; ?></td>
            </tr>
            <tr>
                <th>Fecha de Nacimiento</th>
                <td><?php echo $employee['birth_date']; ?></td>
            </tr>
            <tr>
                <th>RFC</th>
                <td><?php echo $employee['rfc']; ?></td>
            </tr>
            <tr>
                <th>Tipo de Usuario</th>
                <td><?php echo $employee['user_type']; ?></td>
            </tr>
            <tr>
                <th>Estado</th>
                <td><?php echo $employee['status']; ?></td>
            </tr>
            <tr>
                <th>Fecha de Creación</th>
                <td><?php echo $employee['created_at']; ?></td>
            </tr>
            <tr>
                <th>Última Actualización</th>
                <td><?php echo $employee['updated_at']; ?></td>
            </tr>
        </table>
        <a href="index.php" class="btn btn-primary">Volver</a>
    </div>


</body>

</html>

