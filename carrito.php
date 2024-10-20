session_start();

// Inicializa el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar producto al carrito
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    
    // Verifica si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$id_producto])) {
        $_SESSION['carrito'][$id_producto]['cantidad']++;
    } else {
        // Consulta el producto para agregarlo al carrito
        include 'conexion.php'; // Conexión a la base de datos
        $query = "SELECT * FROM productos WHERE id = $id_producto";
        $result = $conexion->query($query);
        $producto = $result->fetch_assoc();

        $_SESSION['carrito'][$id_producto] = [
            'nombre' => $producto['nombre'],
            'precio' => $producto['precio'],
            'cantidad' => 1,
            'imagen' => $producto['imagen'],
        ];
    }
}

// Muestra los productos en el carrito
echo "<h1>Carrito de Compras</h1>";
if (count($_SESSION['carrito']) > 0) {
    foreach ($_SESSION['carrito'] as $id => $item) {
        echo "<div class='producto'>";
        echo "<img src='" . $item['imagen'] . "' alt='" . $item['nombre'] . "'>";
        echo "<h2>" . $item['nombre'] . "</h2>";
        echo "<p>Precio: $" . $item['precio'] . "</p>";
        echo "<p>Cantidad: " . $item['cantidad'] . "</p>";
        echo "</div>";
    }
    echo "<a href='confirmar_compra.php'>Confirmar Compra</a>";
} else {
    echo "El carrito está vacío.";
}
?>
