<?php
require 'conexion.php';
$conn = conexion();

$search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';

$sql = "SELECT id, name, email, phone, user_type FROM employees WHERE status = 'active' AND (name LIKE ? OR email LIKE ?)";
$stmt = $conn->prepare($sql);
$search_term = '%' . $search_term . '%';
$stmt->bind_param("ss", $search_term, $search_term);
$stmt->execute();
$result = $stmt->get_result();
