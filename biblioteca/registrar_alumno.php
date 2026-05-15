<?php
include 'conexion.php';
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "INSERT INTO Alumno (codigo, nombre, carrera, correo, direccion, telefono, sexo, fecha_nac) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            $_POST['cod'], $_POST['nom'], $_POST['car'], $_POST['cor'], 
            $_POST['dir'], $_POST['tel'], $_POST['sex'], $_POST['fec']
        ]);
        $mensaje = "Alumno registrado con éxito.";
    } catch (PDOException $e) { $mensaje = "Error: " . $e->getMessage(); }
}
?>
<!DOCTYPE html>
<html>
<head><title>Registrar Alumno</title></head>
<body>
    <h2>Formulario de Registro de Alumnos</h2>
    <p><strong><?php echo $mensaje; ?></strong></p>
    <form method="POST">
        <label>Código:</label><br><input type="text" name="cod" required><br><br>
        <label>Nombre:</label><br><input type="text" name="nom" required><br><br>
        <label>Carrera:</label><br><input type="text" name="car" required><br><br>
        <label>Correo:</label><br><input type="text" name="cor" required><br><br>
        <label>Direccion:</label><br><input type="text" name="dir" required><br><br>
        <label>Telefono:</label><br><input type="text" name="tel" required><br><br>
        <label>Sexo (M/F):</label><br><input type="text" name="sex" maxlength="1" required><br><br>
        <label>Fecha de Nacimiento:</label><br><input type="date" name="fec" required><br><br>
        <button type="submit">Guardar en BD</button>
        <a href="principal.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>