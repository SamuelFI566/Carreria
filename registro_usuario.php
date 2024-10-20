<?php
// Crear conexión
$conexion = new mysqli('localhost', 'root', '', 'carreria');

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

// Verificar si el nombre de usuario ya existe
$sql_check = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result_check = $conexion->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "El nombre de usuario ya existe. Por favor, elige otro.";
} else {
    // Si el nombre de usuario no existe, proceder a registrar
    $clave_hash = password_hash($clave, PASSWORD_DEFAULT); // Encriptar la contraseña

    $sql = "INSERT INTO usuarios (nombre, usuario, clave, email, telefono, direccion) 
            VALUES ('$nombre', '$usuario', '$clave_hash', '$email', '$telefono', '$direccion')";

    if ($conexion->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

// Cerrar conexión
$conexion->close();
?>

