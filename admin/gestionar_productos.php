<!-- gestionar_productos.php -->
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Conectar a la base de datos
require_once 'conexion.php';

// Obtener productos
$query = "SELECT * FROM productos";
$result = $conexion->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Productos Registrados</h2>
        <a href="agregar_producto.php" class="btn btn-primary">Agregar Producto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($producto = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                        <td>
                            <a href="editar_producto.php?id=<?php echo $producto['id']; ?>">Editar</a>
                            <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
