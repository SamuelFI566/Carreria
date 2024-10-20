<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['user_id'])) {
    echo "Debes iniciar sesión para ver tu historial de compras.";
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM historial_compras WHERE user_id = $user_id";
$result = $conexion->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Historial de Compras</h1>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='compra'>";
        echo "<p>Fecha de compra: " . $row['fecha_compra'] . "</p>";
        echo "<p>Producto ID: " . $row['producto_id'] . "</p>";
        echo "<p>Cantidad: " . $row['cantidad'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No has realizado compras.";
}
?>
