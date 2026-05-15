<?php
session_start();
if(!isset($_SESSION['user'])) { 
    header("Location: index.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SIGEBI - Principal</title>
</head>
<body>

    <div style="border-bottom: 1px solid black; padding: 10px;">
        <span style="font-size: 20px; font-weight: bold;">
            SIGEBI - Sistema de Gestión Bibliotecario
        </span>
    </div>

    <br>

    <div>
        <img src="https://cdn-icons-png.flaticon.com/512/2232/2232688.png" 
             alt="Logo SIGEBI" 
             width="150" 
             style="display: block; margin-bottom: 10px;">
    </div>

    <div style="background-color: #f0f0f0; padding: 10px; width: 300px;">
        <strong>Estado del Sistema:</strong><br>
        Usuario conectado: <span style="color: blue;"><?php echo $_SESSION['user']; ?></span>
    </div>

    <nav>
        <h2>Menú Principal</h2>
        
        <strong>EMPLEADOS</strong>
        <ul>
            <li><a href="registrar_empleado.php">Registrar</a></li>
            <li><a href="consulta_general.php">Consulta General</a></li>
            <li><a href="consulta_individual.php">Consulta Individual</a></li>
        </ul>
        <strong>ALUMNOS</strong>
        <ul>
            <li><a href="registrar_alumno.php">Registrar</a></li>
            <li><a href="consulta_ind_alumno.php">Consulta Individual</a></li>
            <li><a href="consulta_alumnos.php">Consulta General</a></li>
            <li><a href="cambiar_alumno.php">Cambiar</a></li>
            <li><a href="eliminar_alumno.php">Eliminar</a></li>
        </ul>

        <strong>PROFESORES</strong>
        <ul>
            <li><a href="registrar_profesor.php">Registrar</a></li>
            <li><a href="consulta_ind_profesor.php">Consulta Individual</a></li>
            <li><a href="consulta_profesores.php">Consulta General</a></li>
            <li><a href="cambiar_profesor.php">Cambiar</a></li>
            <li><a href="eliminar_profesor.php">Eliminar</a></li>
        </ul>

        <strong>LIBROS</strong>
        <ul>
            <li><a href="registrar_libro.php">Registrar</a></li>
            <li><a href="consulta_ind_libro.php">Consulta Individual</a></li>
            <li><a href="consulta_libros.php">Consulta General</a></li>
            <li><a href="cambiar_libro.php">Cambiar</a></li>
            <li><a href="eliminar_libro.php">Eliminar</a></li>
        </ul>

        <br>
        <a href="logout.php">Cerrar Sesión</a>
    </nav>

</body>
</html>