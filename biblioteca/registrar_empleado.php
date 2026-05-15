<?php
require 'conexion.php';
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Los nombres de columnas deben coincidir con tu tabla 'Empleado'
        $sql = "INSERT INTO Empleado (codigo, nombre, direccion, telefono, sexo, fecha_nac, turno) 
                VALUES (:cod, :nom, :dir, :tel, :sex, :fec, :tur)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            'cod' => $_POST['codigo'],
            'nom' => $_POST['nombre'],
            'dir' => $_POST['direccion'],
            'tel' => $_POST['telefono'],
            'sex' => $_POST['sexo'],
            'fec' => $_POST['fecha_nac'],
            'tur' => $_POST['turno']
        ]);
        $mensaje = "Empleado registrado con éxito.";
    } catch (PDOException $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Registrar Empleado</title></head>
<body>
    <h2>Formulario de Registro de Empleados</h2>
    <p><strong><?php echo $mensaje; ?></strong></p>
    <form method="POST">
        Código: <input type="text" name="codigo" required><br><br>
        Nombre Completo: <input type="text" name="nombre" required><br><br>
        Dirección: <input type="text" name="direccion" required><br><br>
        Teléfono: <input type="text" name="telefono" required><br><br>
        Sexo (M/F): <input type="text" name="sexo" maxlength="1" required><br><br>
        Fecha Nacimiento (AAAA-MM-DD): <input type="date" name="fecha_nac" required><br><br>
        Turno: <input type="text" name="turno" required><br><br>
        <button type="submit">Guardar en BD</button>
        <a href="principal.php"><button type="button">Volver</button></a>
    </form>
</body>
</html>