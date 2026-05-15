<?php
include 'conexion.php';
$stmt = $conexion->query("SELECT * FROM Libro ORDER BY titulo, ejemplar ASC");
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Listado General de Libros</h2>
<table border="1">
    <tr>
        <th>ISBN</th><th>Título</th><th>Autores</th><th>Editorial</th><th>Año</th><th>Ejemplar</th>
    </tr>
    <?php foreach ($libros as $l): ?>
    <tr>
        <td><?php echo $l['isbn']; ?></td>
        <td><?php echo $l['titulo']; ?></td>
        <td><?php echo $l['autores']; ?></td>
        <td><?php echo $l['editorial']; ?></td>
        <td><?php echo $l['anio']; ?></td>
        <td><?php echo $l['ejemplar']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><a href="principal.php">Volver</a>