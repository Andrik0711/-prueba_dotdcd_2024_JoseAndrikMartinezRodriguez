<?php
require 'conexion.php';
$conn = conexion();

$sql = "SELECT id, name, email, phone, user_type FROM employees WHERE status = 'active'";
$result = $conn->query($sql);
