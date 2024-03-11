<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

/*Comprueba si hemos llegado a esta página PHP a través del formulario de modificaciones. 
En este caso comprueba la información "modifica" procedente del botón Guardae del formulario de Modificaciones
Transacción de datos utilizando el método: POST
*/
if(isset($_POST['modifica'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
	$apellido = mysqli_real_escape_string($mysqli, $_POST['apellido']);
	$telefono = mysqli_real_escape_string($mysqli, $_POST['telefono']);
	$direccion = mysqli_real_escape_string($mysqli, $_POST['direccion']);
	$ciudad = mysqli_real_escape_string($mysqli, $_POST['ciudad']);
	$pais = mysqli_real_escape_string($mysqli, $_POST['pais']);
	$cp = mysqli_real_escape_string($mysqli, $_POST['cp']);

	if(empty($nombre) || empty($apellido) || empty($telefono) || empty($direccion) || empty($ciudad) || empty($pais) || empty($cp))	{
		if(empty($nombre)) {
			echo "<font color='red'>Campo nombre vacío.</font><br/>";
		}

		if(empty($apellido)) {
			echo "<font color='red'>Campo apellido vacío.</font><br/>";
		}

		if(empty($telefono)) {
			echo "<font color='red'>Campo telefono vacío.</font><br/>";
		}

		if(empty($direccion)) {
			echo "<font color='red'>Campo direccion vacío.</font><br/>";
		}
		if(empty($ciudad)) {
			echo "<font color='red'>Campo ciudad vacío.</font><br/>";
		}
		if(empty($pais)) {
			echo "<font color='red'>Campo pais vacío.</font><br/>";
		}
		if(empty($cp)) {
			echo "<font color='red'>Campo codigo postal vacío.</font><br/>";
		}
	} //fin si
	else 
	{
//Prepara una sentencia SQL para su ejecución. En este caso una modificación de un registro de la BD.				
		$stmt = mysqli_prepare($mysqli, "UPDATE cliente SET nombre=?,apellido=?,telefono=?,direccion=?,ciudad=?,pais=?,cp=? WHERE id=?");
/*Enlaza variables como parámetros a una setencia preparada. 
i: La variable correspondiente tiene tipo entero
d: La variable correspondiente tiene tipo doble
s:	La variable correspondiente tiene tipo cadena
*/				
		mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $apellido, $telefono, $direccion, $ciudad, $pais, $cp, $id);

//Ejecuta una consulta preparada			
		mysqli_stmt_execute($stmt);
//Libera la memoria donde se almacenó el resultado
		mysqli_stmt_free_result($stmt);
//Cierra la sentencia preparada		
		mysqli_stmt_close($stmt);

		header("Location: index.php");
	}// fin sino
}//fin si
?>


<?php
/*Obtiene el id del dato a modificar a partir de la URL. Transacción de datos utilizando el método: GET*/
$id = $_GET['id'];

$id = mysqli_real_escape_string($mysqli, $id);


//Prepara una sentencia SQL para su ejecución. En este caso selecciona el registro a modificar y lo muestra en el formulario.				
$stmt = mysqli_prepare($mysqli, "SELECT nombre, apellido, telefono, direccion, ciudad, pais, cp  FROM cliente WHERE id=?");
//Enlaza variables como parámetros a una setencia preparada. 
mysqli_stmt_bind_param($stmt, "i", $id);
//Ejecuta una consulta preparada
mysqli_stmt_execute($stmt);
//Enlaza variables a una setencia preparada para el almacenamiento del resultado
mysqli_stmt_bind_result($stmt, $nombre, $apellido, $telefono, $direccion, $ciudad, $pais, $cp);
//Obtiene el resultado de una sentencia SQL preparada en las variables enlazadas
mysqli_stmt_fetch($stmt);
//Libera la memoria donde se almacenó el resultado		
mysqli_stmt_free_result($stmt);
//Cierra la sentencia preparada
mysqli_stmt_close($stmt);
//Cierra la conexión de base de datos previamente abierta
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Panel de control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div>
        <header>
            <h1>Panel de Control</h1>
        </header>

        <main>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="add.html">Alta</a></li>
            </ul>
            <h2>Modificar cliente</h2>
            <form action="modificar.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div>
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>">
                </div>
                <div>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                </div>
                <div>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
                </div>
                <div>
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad" value="<?php echo $ciudad; ?>">
                </div>
                <div>
                    <label for="pais">País:</label>
                    <input type="text" id="pais" name="pais" value="<?php echo $pais; ?>">
                </div>
                <div>
                    <label for="cp">Código postal:</label>
                    <input type="text" id="cp" name="cp" value="<?php echo $cp; ?>">
                </div>
                <button type="submit" name="modifica">Guardar</button>
            </form>
        </main>
        <footer>
            Created by ManuFdzDC &copy; 2024
        </footer>
    </div>
</body>
</html>
