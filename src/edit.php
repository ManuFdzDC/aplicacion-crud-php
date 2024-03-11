<?php
include_once("config.php");

// Verifica si se ha enviado el formulario de modificación
if(isset($_POST['modifica'])) {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $cp = $_POST['cp'];

    // Prepara una sentencia SQL para actualizar el registro en la base de datos
    $stmt = mysqli_prepare($mysqli, "UPDATE cliente SET nombre=?, apellido=?, telefono=?, direccion=?, ciudad=?, pais=?, cp=? WHERE id=?");

    // Enlaza variables como parámetros a la sentencia preparada
    mysqli_stmt_bind_param($stmt, "sssssssi", $nombre, $apellido, $telefono, $direccion, $ciudad, $pais, $cp, $id);

    // Ejecuta la consulta preparada
    mysqli_stmt_execute($stmt);

    // Cierra la sentencia preparada
    mysqli_stmt_close($stmt);

    // Redirige al usuario de nuevo a la página de inicio
    header("Location: index.php");
    exit();
}

// Obtiene el ID del registro a modificar a partir de la URL.
$id = $_GET['id'];
$id = mysqli_real_escape_string($mysqli, $id);

// Prepara una sentencia SQL para seleccionar el registro a modificar.
$stmt = mysqli_prepare($mysqli, "SELECT nombre, apellido, telefono, direccion, ciudad, pais, cp FROM cliente WHERE id=?");
// Enlaza variables como parámetros a la sentencia preparada.
mysqli_stmt_bind_param($stmt, "i", $id);
// Ejecuta la consulta preparada.
mysqli_stmt_execute($stmt);
// Enlaza variables para almacenar el resultado de la consulta.
mysqli_stmt_bind_result($stmt, $nombre, $apellido, $telefono, $direccion, $ciudad, $pais, $cp);
// Obtiene el resultado de la consulta preparada en las variables enlazadas.
mysqli_stmt_fetch($stmt);
// Cierra la sentencia preparada.
mysqli_stmt_close($stmt);
// Cierra la conexión de la base de datos previamente abierta.
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Modificar cliente</title>
    <!-- Incluye los archivos de estilo de AdminLTE -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Formulario de modificación de cliente -->
                <div class="row">
                    <div class="col-md-6">
                        <form action="edit.php" method="post" class="card card-primary">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $apellido; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $direccion; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ciudad">Ciudad:</label>
                                    <input type="text" id="ciudad" name="ciudad" class="form-control" value="<?php echo $ciudad; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pais">País:</label>
                                    <input type="text" id="pais" name="pais" class="form-control" value="<?php echo $pais; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cp">Código postal:</label>
                                    <input type="text" id="cp" name="cp" class="form-control" value="<?php echo $cp; ?>">
                                </div>
                                <button type="submit" name="modifica" class="btn btn-primary">Guardar</button>
                                <a href="index.php" class="btn btn-secondary">Volver al inicio</a>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>
