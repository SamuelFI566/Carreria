<?php
$host = 'localhost';
$user = 'root';
$password = '';  // Sin contraseña por defecto
$db = 'Carreria';  // Nombre de la base de datos

// Crear conexión
$conexion = new mysqli($host, $user, $password, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
echo "Conexión exitosa a la base de datos.";
?>
