<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Registro de Empleado</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="container">
      <h2 class="my-4">Registro de Nuevo Empleado</h2>
      <form action="../controller/register.php" method="post">
        <div class="form-group">
          <label for="name">Nombre</label>
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            required
          />
        </div>
        <div class="form-group">
          <label for="phone">Teléfono</label>
          <input
            type="text"
            class="form-control"
            id="phone"
            name="phone"
            required
          />
        </div>
        <div class="form-group">
          <label for="email">Correo Electrónico</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required
          />
        </div>
        <div class="form-group">
          <label for="birth_date">Fecha de Nacimiento</label>
          <input
            type="date"
            class="form-control"
            id="birth_date"
            name="birth_date"
            required
          />
        </div>
        <div class="form-group">
          <label for="rfc">RFC</label>
          <input
            type="text"
            class="form-control"
            id="rfc"
            name="rfc"
            required
          />
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
      </form>
    </div>
  </body>
</html>