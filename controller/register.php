<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        header("Location: ../views/index.html"); // Página de éxito
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
