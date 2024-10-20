session_start();
include 'conexion.php';

if (empty($_SESSION['carrito'])) {
    echo "El carrito está vacío. No puedes confirmar la compra.";
    exit;
}

// Aquí puedes insertar la lógica para registrar la compra en la base de datos
foreach ($_SESSION['carrito'] as $id => $item) {
    // Insertar en la tabla de historial de compras (debes crearla previamente)
    $query = "INSERT INTO historial_compras (user_id, producto_id, cantidad, fecha_compra) VALUES (?, ?, ?, NOW())";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("iii", $_SESSION['user_id'], $id, $item['cantidad']);
    $stmt->execute();

    // Actualizar la cantidad en la tabla de productos
    $query = "UPDATE productos SET cantidad = cantidad - ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ii", $item['cantidad'], $id);
    $stmt->execute();
}

// Vaciar el carrito
unset($_SESSION['carrito']);
echo "Compra realizada con éxito.";
?>
