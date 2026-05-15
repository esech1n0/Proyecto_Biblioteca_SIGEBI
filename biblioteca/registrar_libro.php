<?php
require 'conexion.php';
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "INSERT INTO Libro (isbn, titulo, autores, editorial, anio, ejemplar) 
                VALUES (:isbn, :tit, :aut, :edi, :ani, :eje)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            'isbn' => $_POST['isbn'],
            'tit'  => $_POST['titulo'],
            'aut'  => $_POST['autores'],
            'edi'  => $_POST['editorial'],
            'ani'  => $_POST['anio'],
            'eje'  => $_POST['ejemplar']
        ]);
        $mensaje = "Libro registrado: " . $_POST['titulo'] . " (Ejemplar " . $_POST['ejemplar'] . ")";
    } catch (PDOException $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Registro de Libros</title></head>
<body>
    <h2>Formulario de Registro de Libros</h2>
    <p><strong><?php echo $mensaje; ?></strong></p>
    <form method="POST">
        <label>ISBN:</label><br><input type="text" name="isbn" required><br><br>
        <label>Título del Libro:</label><br><input type="text" name="titulo" required><br><br>
        <label>Autor(es):</label><br><input type="text" name="autores" required><br><br>
        <label>Editorial:</label><br><input type="text" name="editorial" required><br><br>
        <label>Año de Publicación:</label><br><input type="text" name="anio" required><br><br>
        <label>Número de Ejemplar:</label><br><input type="number" name="ejemplar" required><br><br>
        <button type="submit">Guardar en BD</button>
        <a href="principal.php"><button type="button">Volver</button></a>
    </form>
</body>
</html>