<?php
// Datos de conexión
$host = "localhost";
$puerto = "5432";
$base_de_datos = "Biblioteca";
$usuario = "postgres";
$contraseña = "12345678"; 

try {
    
    $conexion = new PDO("pgsql:host=$host;port=$puerto;dbname=$base_de_datos", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    $sql = "SELECT * FROM Empleado ORDER BY codigo ASC";
    
    
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    $empleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SIGEBI - Consulta General</title>
</head>
<body>

    <h2>Listado General de Empleados</h2>

    <table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Sexo</th>
                <th>Fecha de Nac.</th>
                <th>Turno</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($empleados) > 0): ?>
                <?php foreach ($empleados as $emp): ?>
                    <tr>
                        <td><?php echo $emp['codigo']; ?></td>
                        <td><?php echo $emp['nombre']; ?></td>
                        <td><?php echo $emp['direccion']; ?></td>
                        <td><?php echo $emp['telefono']; ?></td>
                        <td><?php echo $emp['sexo']; ?></td>
                        <td><?php echo $emp['fecha_de_nacimiento']; ?></td>
                        <td><?php echo $emp['turno']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No hay empleados registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <a href="principal.php">⬅ Volver al Menú Principal</a>

</body>
</html>