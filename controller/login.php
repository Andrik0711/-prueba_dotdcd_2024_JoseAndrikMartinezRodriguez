<?php
session_start();
require 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn = conexion();

    $sql = "SELECT id, name, password, user_type, status FROM employees WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Si el email coincide, se obtienen los datos del usuario
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password, $user_type, $status);
        $stmt->fetch();

        // Si el usuario está activo, se verifica la contraseña
        if ($status == 'active') {
            if (password_verify($password, $hashed_password)) { //$hashed_password es para comparar la contraseña encriptada
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_type'] = $user_type;
                header("Location: ../views/dashboard.php");
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario inactivo.";
        }
    } else {
        echo "No se encontró una cuenta con ese correo electrónico.";
    }

    $stmt->close();
    $conn->close();
}
