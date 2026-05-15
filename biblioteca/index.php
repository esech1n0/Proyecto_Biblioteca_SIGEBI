<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['usuario'];
    $p = $_POST['contrasena'];

    // Validamos contra la tabla Usuario creada en el Avance 1
    $sql = "SELECT * FROM usuario WHERE nombre_del_usuario = :u AND contraseña = :p";
    $stmt = $conexion->prepare($sql);
    $stmt->execute(['u' => $u, 'p' => $p]);

    if ($stmt->fetch()) {
        $_SESSION['user'] = $u;
        header("Location: principal.php");
    } else {
        echo "<script>alert('Datos incorrectos');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Inicio de Sesión</h2>
    <form method="POST">
        Usuario: <input type="text" name="usuario" required><br><br>
        Contraseña: <input type="password" name="contrasena" required><br><br>
        <button type="submit">Aceptar</button>
    </form>
</body>
</html>