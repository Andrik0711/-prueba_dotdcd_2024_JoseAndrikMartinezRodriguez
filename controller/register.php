<?php
require 'conexion.php';
require 'session.php';
sesionStart();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que el usuario sea administrador
    if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'admin') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $birth_date = $_POST['birth_date'];
        $rfc = $_POST['rfc'];
        $user_type = $_POST['user_type'];

        $conn = conexion();

        $sql = "INSERT INTO employees (name, phone, email, password, birth_date, rfc, user_type) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $name, $phone, $email, $password, $birth_date, $rfc, $user_type);

        if ($stmt->execute()) {
            // Redirigir a la página de éxito
            header("Location: ../views/index.php?success");
            exit();
        } else {
            // Redirigir a la página de error
            header("Location: ../views/index.php?error");
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        // Redirigir si no es administrador
        header("Location: ../views/index.php?error");
        exit();
    }
} else {
    // Redirigir si el método de la solicitud no es POST
    header("Location: ../views/index.php?error");
    exit();
}
