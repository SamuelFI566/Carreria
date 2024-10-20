<!-- editar_producto.php -->
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Conectar a la base de datos
require_once 'conexion.php';

$id = $_GET['id'];
$query = "SELECT * FROM productos WHERE id = $id";
$result = $conexion->query($query);
$producto = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $query = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', cantidad='$cantidad' WHERE id=$id";
    if ($conexion->query($query) === TRUE) {
        echo "Producto actualizado con éxito.";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Producto</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" name="precio" value="<?php echo $producto['precio']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
