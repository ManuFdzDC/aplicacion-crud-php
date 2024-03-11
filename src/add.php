<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Alta Cliente</title>
    <!-- Incluye los archivos de estilo de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    
<body>
<div class="container">
    <header>
        <h1>Panel de Control</h1>
    </header>

    <main>

<?php
// Incluye el archivo de configuración de la base de datos
include_once("config.php");

// Verifica si se ha enviado el formulario
if(isset($_POST['inserta'])) {
    // Obtiene los datos del formulario
    $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($mysqli, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($mysqli, $_POST['telefono']);
    $direccion = mysqli_real_escape_string($mysqli, $_POST['direccion']);
    $ciudad = mysqli_real_escape_string($mysqli, $_POST['ciudad']);
    $pais = mysqli_real_escape_string($mysqli, $_POST['pais']);
    $cp = mysqli_real_escape_string($mysqli, $_POST['cp']);

    // Verifica si existen campos vacíos
    if(empty($nombre) || empty($apellido) || empty($telefono) || empty($direccion) || empty($ciudad) || empty($pais) || empty($cp)) {
        echo "<div class='alert alert-danger' role='alert'>Por favor, completa todos los campos.</div>";
        echo "<a href='javascript:self.history.back();' class='btn btn-secondary'>Volver atrás</a>";
    } else {
        // Prepara la consulta SQL para insertar los datos en la tabla
        $stmt = mysqli_prepare($mysqli, "INSERT INTO cliente (nombre, apellido, telefono, direccion, ciudad, pais, cp) VALUES (?, ?, ?, ?, ?, ?, ?)");
        // Vincula los parámetros de la consulta
        mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $apellido, $telefono, $direccion, $ciudad, $pais, $cp);
        // Ejecuta la consulta
        if(mysqli_stmt_execute($stmt)) {
            echo "<div class='alert alert-success' role='alert'>Datos añadidos correctamente</div>";
            echo "<a href='index.php' class='btn btn-primary'>Ver resultado</a>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al insertar los datos.</div>";
        }
        // Cierra la sentencia preparada
        mysqli_stmt_close($stmt);
    }
}

// Cierra la conexión
mysqli_close($mysqli);
?>

    </main>
    <footer>
        Created by the ManuFdzDC &copy; 2024
    </footer>
</div>
</body>
</html>
