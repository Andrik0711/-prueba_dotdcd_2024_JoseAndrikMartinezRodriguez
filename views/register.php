<?php
require '../controller/session.php';
sesionStart();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Registro de Empleado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="container">
    <h2 class="my-4">Registro de Nuevo Empleado</h2>
    <form action="../controller/register.php" method="post">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras y espacios" required />
      </div>
      <div class="form-group">
        <label for="phone">Teléfono</label>
        <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" title="Ingrese un número de teléfono válido de 10 dígitos" required />
      </div>
      <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required />
      </div>
      <div class="form-group">
        <label for="birth_date">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="birth_date" name="birth_date" required />
      </div>
      <div class="form-group">
        <label for="rfc">RFC</label>
        <input type="text" class="form-control" id="rfc" name="rfc" pattern="[A-Za-z0-9]{10}" title="El RFC debe tener 10 caracteres alfanuméricos" required />
      </div>
      <div class="form-group">
        <label for="user_type">Tipo de Usuario</label>
        <select class="form-control" id="user_type" name="user_type" required>
          <option value="admin">Administrador</option>
          <option value="employee">Empleado</option>
          <option value="sales_executive">Ejecutivo de Ventas</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Registrar</button>
      <!-- btn de volver -->
      <a href="index.php" class="btn btn-primary">Volver</a>
    </form>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('success')) {
        swal({
          title: "¡Buen trabajo!",
          text: "¡Proceso realizado correctamente!",
          icon: "success",
          button: "OK",
        });
      } else if (urlParams.has('error')) {
        swal({
          title: "¡Error!",
          text: "Hubo un problema.",
          icon: "error",
          button: "OK",
        });
      }
    });
  </script>
</body>

</html>