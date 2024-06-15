<?php
session_start();

require 'conexion.php';
$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, name, password, user_type FROM employees WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password, $user_type);
        $stmt->fetch();
        
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_type'] = $user_type;
            header("Location: ../views/dashboard.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró una cuenta con ese correo electrónico.";
    }

    $stmt->close();
    $conn->close();
}
?>
