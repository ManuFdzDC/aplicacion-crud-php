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
		mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $apellido, $telefono, $direccion, $ciudad, $pais, $cp, $id);
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
mysqli_stmt_bind_result($stmt, $nombre, $apellido, $telefono);
//Obtiene el resultado de una sentencia SQL preparada en las variables enlazadas
mysqli_stmt_fetch($stmt);
//Libera la memoria donde se almacenó el resultado		
mysqli_stmt_free_result($stmt);
//Cierra la sentencia preparada
mysqli_stmt_close($stmt);
//Cierra la conexión de base de datos previamente abierta
mysqli_close($mysqli);
?>


