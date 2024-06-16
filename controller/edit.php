<?php
require 'conexion.php';
$conn = conexion();

// Verificar si hay una sesión iniciada y si el usuario es admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
    header("Location: ../views/index.php");
    exit();
}

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
        exit();
    } else {
        echo "Error al actualizar la información del empleado: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Si es GET se obtiene la información del empleado
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $employee = $result->fetch_assoc();

    if (!$employee) {
        // Si no se encuentra el empleado, redirigir al index
        header("Location: ../views/index.php");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../views/index.php");
    exit();
}
