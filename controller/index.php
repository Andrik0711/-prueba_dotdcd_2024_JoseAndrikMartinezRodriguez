<?php
require '../controller/session.php';
sesionStart();

require 'conexion.php';
$conn = conexion();

$limit = 5; // Número de registros por página
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
$search_term = isset($_POST['search_term']) ? '%' . $_POST['search_term'] . '%' : null;

// Determinar si se está realizando una búsqueda
$is_searching = !is_null($search_term);

if ($user_type == 'admin') {
    if ($is_searching) {
        // Calcular el número total de registros para la búsqueda
        $count_stmt = $conn->prepare("SELECT COUNT(*) AS count FROM employees WHERE status = 'active' AND (name LIKE ? OR email LIKE ?)");
        $count_stmt->bind_param("ss", $search_term, $search_term);
    } else {
        // Calcular el número total de registros sin búsqueda
        $count_stmt = $conn->prepare("SELECT COUNT(*) AS count FROM employees WHERE status = 'active'");
    }

    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $row = $count_result->fetch_assoc();
    $total_records = $row['count'];
    $total_pages = ceil($total_records / $limit);
    $count_stmt->close();

    if ($is_searching) {
        $stmt = $conn->prepare("SELECT * FROM employees WHERE status = 'active' AND (name LIKE ? OR email LIKE ?) ORDER BY id ASC LIMIT ?, ?");
        $stmt->bind_param("ssii", $search_term, $search_term, $start, $limit);
    } else {
        $stmt = $conn->prepare("SELECT * FROM employees WHERE status = 'active' ORDER BY id ASC LIMIT ?, ?");
        $stmt->bind_param("ii", $start, $limit);
    }
} else {
    $stmt = $conn->prepare("SELECT * FROM employees WHERE id = ? AND status = 'active' ORDER BY id ASC");
    $stmt->bind_param("i", $user_id);
}

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();
