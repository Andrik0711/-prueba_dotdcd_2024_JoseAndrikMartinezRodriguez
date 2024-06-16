<?php
require 'conexion.php';
$conn = conexion();

// Verificar si el método de la solicitud es GET y si el id está definido en la URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];

    // Si el usuario no es administrador y el id no coincide con su propio id, redirigir al index
    if ($user_type != 'admin' && $id != $user_id) {
        header("Location: ../views/index.php");
        exit();
    }

    // Consultar la información del empleado con el ID proporcionado
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

} else {
    // Redirigir al index si no se proporciona un ID válido en la URL
    header("Location: ../views/index.php");
    exit();
}

$stmt->close();
$conn->close();