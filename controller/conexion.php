<?php
function conexion()
{
    $servername = "localhost";
    $username = "root"; // El usuario por defecto en WAMP
    $password = ""; // La contraseña por defecto en WAMP es vacía
    $dbname = "employee_management";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    //  echo "Conexión exitosa";
    return $conn;
}
