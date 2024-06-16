<?php
require '../controller/index.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php if ($user_type == 'admin') : ?>
            <div class="search_container">
                <h2 class="my-2">Búsqueda de Empleados</h2>
                <div class="form_container d-flex">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="search_term" class="my-2">Buscar:</label>
                            <input type="text" class="form-control my-4" id="search_term" name="search_term" placeholder="Nombre o Correo">
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <button type="submit" class="search_all btn btn-primary">Mostrar todo</button>

                        <!-- Btn de registrar -->
                        <a href="register.php" class="btn btn-primary">Registrar Empleado</a>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <h2 class="my-4">Lista de Empleados</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Tipo de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['user_type']; ?></td>
                        <td>
                            <?php if ($user_type == 'admin') : ?>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            <?php endif; ?>
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Detalles</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Paginación condicionada solo para el admin -->
        <?php if ($user_type == 'admin') : ?>
            <nav>
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                            <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <!-- Btn de volver al dashboard -->
        <a href="dashboard.php" class="btn btn-primary">Volver al Dashboard</a>
    </div>
</body>

</html>