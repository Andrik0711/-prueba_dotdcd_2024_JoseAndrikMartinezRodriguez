<?php
require 'conexion.php';
$conn = conexion();

$limit = 1; // Número de registros por página
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT COUNT(*) FROM employees WHERE status = 'active'";
$result = $conn->query($sql);
$total_records = $result->fetch_array()[0];
$total_pages = ceil($total_records / $limit);

// Solo se obtienen los empleados activos
$sql = "SELECT id, name, email, phone, user_type FROM employees WHERE status = 'active' LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

?>