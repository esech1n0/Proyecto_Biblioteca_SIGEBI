<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SIGEBI - Sistema de Gestión Bibliotecario</title>
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
        Usuario conectado: <span style="color: blue;">Administrador</span>
    </div>

    <br>

    <nav>
        <h3>Menú Principal</h3>
        <ul>
            <li>
                <strong>EMPLEADOS</strong>
                <ul>
                    <li><a href="registrar_empleado.php">Registrar</a></li>
                    
                    <li>Consulta individual</li>
                   <li><a href="consulta_general.php">Consulta general</a></li>
                    <li>Cambiar</li>
                    <li>Eliminar</li>
                </ul>
            </li>
            
            
            <li><a href="index.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

</body>
</html>