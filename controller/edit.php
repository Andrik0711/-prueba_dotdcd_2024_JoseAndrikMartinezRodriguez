<?php
require 'conexion.php';
$conn = conexion();

// Si es POST se actualiza la información del empleado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth_date'];
    $rfc = $_POST['rfc'];
    $user_type = $_POST['user_type'];

    $sql = "UPDATE employees SET name = ?, phone = ?, email = ?, birth_date = ?, rfc = ?, user_type = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $phone, $email, $birth_date, $rfc, $user_type, $id);

    if ($stmt->execute()) {
        echo "Información del empleado actualizada con éxito.";
        header("Location: ../views/index.php");
    } else {
        echo "Error al actualizar la información del empleado: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

// Si es GET se obtiene la información del empleado
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $employee = $result->fetch_assoc();
}
