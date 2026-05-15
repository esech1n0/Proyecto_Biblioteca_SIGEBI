<?php
require 'conexion.php';
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "INSERT INTO Maestro (codigo, nombre, direccion, telefono, sexo, fecha_nac, departamento, correo) 
                VALUES (:cod, :nom, :dir, :tel, :sex, :fec, :dep, :cor)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            'cod' => $_POST['codigo'],
            'nom' => $_POST['nombre'],
            'dir' => $_POST['direccion'],
            'tel' => $_POST['telefono'],
            'sex' => $_POST['sexo'],
            'fec' => $_POST['fecha_nac'],
            'dep' => $_POST['depto'],
            'cor' => $_POST['correo']
        ]);
        $mensaje = "Profesor " . $_POST['nombre'] . " registrado con éxito.";
    } catch (PDOException $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Registro de Profesores</title></head>
<body>
    <h2>Formulario de Registro de Profesores</h2>
    <p><strong><?php echo $mensaje; ?></strong></p>
    <form method="POST">
        <label>Código:</label><br><input type="text" name="codigo" required><br><br>
        <label>Nombre Completo:</label><br><input type="text" name="nombre" required><br><br>
        <label>Dirección:</label><br><input type="text" name="direccion" required><br><br>
        <label>Teléfono:</label><br><input type="text" name="telefono" required><br><br>
        <label>Sexo (M/F):</label><br><input type="text" name="sexo" maxlength="1" required><br><br>
        <label>Fecha Nacimiento:</label><br><input type="date" name="fecha_nac" required><br><br>
        <label>Departamento:</label><br><input type="text" name="depto" required><br><br>
        <label>Correo Académico:</label><br><input type="email" name="correo" required><br><br>
        <button type="submit">Guardar en BD</button>
        <a href="principal.php"><button type="button">Volver</button></a>
    </form>
</body>
</html>