<!-- dashboard.php -->
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenido al Panel de Administración</h2>
        <ul>
            <li><a href="gestionar_usuarios.php">Gestionar Usuarios</a></li>
            <li><a href="gestionar_productos.php">Gestionar Productos</a></li>
        </ul>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
