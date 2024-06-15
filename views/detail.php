<?php
require '../controller/detail.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Información de Empleado</h2>
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['name']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $employee['phone']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['email']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="birth_date">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo $employee['birth_date']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $employee['rfc']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="user_type">Tipo de Usuario</label>
            <input type="text" class="form-control" id="user_type" name="user_type" value="<?php echo $employee['user_type']; ?>" readonly>
        </div>
    </div>
</body>

</html>