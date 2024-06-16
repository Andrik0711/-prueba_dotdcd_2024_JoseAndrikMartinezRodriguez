<?php
require '../controller/session.php';
sesionStart();

require 'conexion.php';
$conn = conexion();

$limit = 1; // Número de registros por página
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

if ($user_type == 'admin') {
    // Obtener el número total de registros
    $result = $conn->query("SELECT COUNT(*) AS count FROM employees WHERE status = 'active'");
    $row = $result->fetch_assoc();
    $total_records = $row['count'];

    // Calcular el número total de páginas
    $total_pages = ceil($total_records / $limit);

    $stmt = $conn->prepare("SELECT * FROM employees WHERE status = 'active' LIMIT ?, ?");
    $stmt->bind_param("ii", $start, $limit);
} else {
    $stmt = $conn->prepare("SELECT * FROM employees WHERE id = ? AND status = 'active'");
    $stmt->bind_param("i", $user_id);
}

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();
