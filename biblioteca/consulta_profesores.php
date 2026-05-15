<?php
include 'conexion.php';
$stmt = $conexion->query("SELECT * FROM Maestro ORDER BY nombre ASC");
$profesores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Listado General de Profesores</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Sexo</th>
        <th>Nacimiento</th>
        <th>Departamento</th>
        <th>Correo</th>
    </tr>
    <?php foreach ($profesores as $pr): ?>
    <tr>
        <td><?php echo $pr['codigo']; ?></td>
        <td><?php echo $pr['nombre']; ?></td>
        <td><?php echo $pr['direccion']; ?></td>
        <td><?php echo $pr['telefono']; ?></td>
        <td><?php echo $pr['sexo']; ?></td>
        <td><?php echo $pr['fecha_nac']; ?></td>
        <td><?php echo $pr['departamento']; ?></td>
        <td><?php echo $pr['correo']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><a href="principal.php">Volver</a>