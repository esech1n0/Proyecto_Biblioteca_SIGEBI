<?php
include 'conexion.php';
$stmt = $conexion->query("SELECT * FROM Alumno ORDER BY nombre ASC");
$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Listado General de Alumnos</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Código</th><th>Nombre</th><th>Carrera</th><th>Correo</th><th>Dirección</th><th>Teléfono</th><th>Sexo</th><th>Nacimiento</th>
    </tr>
    <?php foreach ($alumnos as $a): ?>
    <tr>
        <td><?php echo $a['codigo']; ?></td>
        <td><?php echo $a['nombre']; ?></td>
        <td><?php echo $a['carrera']; ?></td>
        <td><?php echo $a['correo']; ?></td>
        <td><?php echo $a['direccion']; ?></td>
        <td><?php echo $a['telefono']; ?></td>
        <td><?php echo $a['sexo']; ?></td>
        <td><?php echo $a['fecha_nac']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><a href="principal.php">Volver</a>