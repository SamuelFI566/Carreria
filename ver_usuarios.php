<?php
// Crear conexión
$conexion = new mysqli('localhost', 'root', '', 'carreria');

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener todos los usuarios
$sql = "SELECT * FROM usuarios";
$result = $conexion->query($sql);

echo "<h1>Usuarios Registrados</h1>";

if ($result->num_rows > 0) {
    // Mostrar los datos en una tabla
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Clave (Encriptada)</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
            </tr>";
    
    // Recorrer los resultados
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . htmlspecialchars($row['nombre']) . "</td>
                <td>" . htmlspecialchars($row['usuario']) . "</td>
                <td>" . htmlspecialchars($row['clave']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['telefono']) . "</td>
                <td>" . htmlspecialchars($row['direccion']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay usuarios registrados.";
}

// Cerrar conexión
$conexion->close();
?>
