<!-- login.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Login Administrador</h2>
        <form action="dashboard.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="clave">Contraseña:</label>
                <input type="password" class="form-control" name="clave" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
