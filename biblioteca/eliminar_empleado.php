<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];

    try {
        // Instrucción SQL para eliminar
        $sql = "DELETE FROM Empleado WHERE codigo = :cod";
        $stmt = $conexion->prepare($sql);
        $stmt->execute(['cod' => $codigo]);

        // Redireccionar de vuelta a la consulta general con un mensaje
        header("Location: consulta_general.php?msg=Eliminado correctamente");
        exit();
    } catch (PDOException $e) {
        echo "Error al eliminar: " . $e->getMessage();
    }
} else {
    echo "No se proporcionó un código válido.";
}
?>