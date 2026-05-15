<?php
require 'conexion.php';
try {
    $sql = "SELECT * FROM Empleado ORDER BY codigo ASC";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    $empleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Consulta General Empleados</title></head>
<body>
    <h2>Listado General de Empleados</h2>
    <table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #f2f2f2;">
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
                        <td><?php echo $emp['fecha_nac']; ?></td>
                        <td><?php echo $emp['turno']; ?></td>
                        <td>
                            <a href="eliminar_empleado.php?id=<?php echo $emp['codigo']; ?>" 
                                onclick="return confirm('¿Estás seguro de que deseas dar de baja a este empleado?');" 
                                style="color: red; text-decoration: none; font-weight: bold;">
                                [Dar de Baja]
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">No hay empleados registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
    <a href="principal.php">⬅ Volver al Menú Principal</a>
</body>
</html>