<?php
require '../controller/session.php';
sesionStart();

require '../controller/edit.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Empleado</h1>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($employee['id']); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($employee['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($employee['phone']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($employee['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo htmlspecialchars($employee['birth_date']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="rfc" class="form-label">RFC</label>
                <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo htmlspecialchars($employee['rfc']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="user_type" class="form-label">Tipo de Usuario</label>
                <select class="form-control" id="user_type" name="user_type" required>
                    <option value="admin" <?php if ($employee['user_type'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="employee" <?php if ($employee['user_type'] == 'employee') echo 'selected'; ?>>Employee</option>
                    <option value="sales_executive" <?php if ($employee['user_type'] == 'sales_executive') echo 'selected'; ?>>Sales Executive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>

</html>