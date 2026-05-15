<?php
include 'conexion.php';
$empleado = null;

if (isset($_POST['codigo_busqueda'])) {
    $id = $_POST['codigo_busqueda'];
    // SQL Empotrado para búsqueda individual
    $res = pg_query_params($conn, "SELECT * FROM Empleado WHERE codigo = $1", array($id));
    $empleado = pg_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SIGEBI - Consulta Individual</title>
</head>
<body style="background-color: #f4f1ea; color: #5d4037;">
    <h2>Buscar Empleado</h2>
    <form method="POST">
        <input type="number" name="codigo_busqueda" placeholder="Ingrese Código (Ej: 777)" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if ($empleado): ?>
        <h3>Datos Encontrados:</h3>
        <p><b>Nombre:</b> <?php echo $empleado['nombre']; ?></p>
        <p><b>Usuario:</b> <?php echo $empleado['usuario']; ?></p>
        <p><b>Rol:</b> <?php echo $empleado['rol']; ?></p>
        <p><b>Turno:</b> <?php echo $empleado['turno']; ?></p>
    <?php elseif (isset($_POST['codigo_busqueda'])): ?>
        <p style="color: red;">Empleado no encontrado.</p>
    <?php endif; ?>
    
    <br><a href="principal.php">Volver</a>
</body>
</html>