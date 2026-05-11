<?php
$mensaje = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $host = "localhost";
    $puerto = "5432";
    $base_de_datos = "Biblioteca";
    $usuario = "postgres";
    $contraseña = "12345678"; 

    try {
        $conexion = new PDO("pgsql:host=$host;port=$puerto;dbname=$base_de_datos", $usuario, $contraseña);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $cod = $_POST['codigo'];
        $nom = $_POST['nombre'];
        $dir = $_POST['direccion'];
        $tel = $_POST['telefono'];
        $sex = $_POST['sexo'];
        $fec = $_POST['fecha_nac'];
        $tur = $_POST['turno'];

        
        $sql = "INSERT INTO Empleado (codigo, nombre, direccion, telefono, sexo, fecha_de_nacimiento, turno) 
                VALUES ('$cod', '$nom', '$dir', '$tel', '$sex', '$fec', '$tur')";

        $conexion->exec($sql);
        $mensaje = "✅ Empleado $nom registrado con éxito.";
        
    } catch (PDOException $e) {
        $mensaje = "❌ Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SIGEBI - Registro</title>
</head>
<body>
    <h2>Formulario de Registro de Empleados</h2>
    
    <p><strong><?php echo $mensaje; ?></strong></p>

    <form method="POST">
        <label>Código:</label><br>
        <input type="text" name="codigo" required><br><br>

        <label>Nombre Completo:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion" required><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" required><br><br>

        <label>Sexo (M/F):</label><br>
        <input type="text" name="sexo" maxlength="1" required><br><br>

        <label>Fecha Nacimiento (AAAA-MM-DD):</label><br>
        <input type="date" name="fecha_nac" required><br><br>

        <label>Turno:</label><br>
        <input type="text" name="turno" required><br><br>

        <button type="submit">Guardar en BD</button>
        <a href="principal.php"><button type="button">Cancelar / Volver</button></a>
    </form>
</body>
</html>