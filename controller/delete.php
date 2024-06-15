<?php
require 'conexion.php';
$conn = conexion();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// No se borra el registro, solo se cambia el status a 'inactive'
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "UPDATE employees SET status = 'inactive' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Empleado eliminado con éxito.";
        header("Location: ../views/index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
