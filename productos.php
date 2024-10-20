<?php
include 'conexion.php'; // Asegúrate de que la conexión a la base de datos está establecida

$query = "SELECT * FROM productos WHERE cantidad > 0"; // Solo productos en stock
$result = $conexion->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Productos Disponibles</h1>";
    echo "<div class='productos'>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<div class='producto'>";
        echo "<img src='" . $row['imagen'] . "' alt='" . $row['nombre'] . "'>";
        echo "<h2>" . $row['nombre'] . "</h2>";
        echo "<p>" . $row['descripcion'] . "</p>";
        echo "<p>Precio: $" . $row['precio'] . "</p>";
        echo "<p>Cantidad en stock: " . $row['cantidad'] . "</p>";
        echo "<a href='agregar_al_carrito.php?id=" . $row['id'] . "'>Agregar al Carrito</a>";
        echo "</div>";
    }
    
    echo "</div>";
} else {
    echo "No hay productos disponibles.";
}
?>
