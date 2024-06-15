<?php
require '../controller/edit.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Editar Información de Empleado</h2>
        <form action="../controller/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $employee['phone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="birth_date">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo $employee['birth_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="rfc">RFC</label>
                <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $employee['rfc']; ?>" required>
            </div>
            <div class="form-group">
                <label for="user_type">Tipo de Usuario</label>
                <select class="form-control" id="user_type" name="user_type" required>
                    <option value="admin" <?php if ($employee['user_type'] == 'admin') echo 'selected'; ?>>Administrador</option>
                    <option value="employee" <?php if ($employee['user_type'] == 'employee') echo 'selected'; ?>>Empleado</option>
                    <option value="sales_executive" <?php if ($employee['user_type'] == 'sales_executive') echo 'selected'; ?>>Ejecutivo de Ventas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>

</html>