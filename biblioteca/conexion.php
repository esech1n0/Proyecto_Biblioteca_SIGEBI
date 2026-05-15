<?php
// Variables de conexión
$host = "localhost";
$puerto = "5432";
$base_de_datos = "Biblioteca";
$usuario = "postgres";         // Tu usuario de Postgres
$contraseña = "1234567"; // Pon la contraseña de tu pgAdmin

// Cadena de conexión (DSN)
$dsn = "pgsql:host=$host;port=$puerto;dbname=$base_de_datos;";

try {
    // Intentamos crear la conexión
    $conexion = new PDO($dsn, $usuario, $contraseña);
    
    // Le decimos a PDO que nos muestre los errores si algo falla
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "¡Conexión exitosa al servidor Postgres y a la BD Biblioteca con PHP!";
    
} catch (PDOException $e) {
    // Si la contraseña o algo está mal, mostramos el error
    echo "Error al conectarse a la base de datos: " . $e->getMessage();
}
?>