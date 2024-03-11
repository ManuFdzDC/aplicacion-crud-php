<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario en la BD
*/

include_once("config.php");

//Consulta de selección. Selecciona todos los usuarios ordenados de manera descendente por el campo id
$result = mysqli_query($mysqli, "SELECT * FROM cliente ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Panel de control</title>
    <!-- Incluye los archivos de estilo de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="mt-3">Panel de Control</h1>
        </header>

        <main>
		<ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="add.html">Alta</a>
                </li>
            </ul>
            <h2 class="mt-3">Listado de clientes</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>País</th>
                        <th>Código postal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Genera la tabla de la página inicial
                    while ($res = mysqli_fetch_assoc($result)) {
                        echo "<tr>\n";
                        echo "<td>".$res['id']."</td>\n";
                        echo "<td>".$res['nombre']."</td>\n";
                        echo "<td>".$res['apellido']."</td>\n";
                        echo "<td>".$res['telefono']."</td>\n";
                        echo "<td>".$res['direccion']."</td>\n";
                        echo "<td>".$res['ciudad']."</td>\n";
                        echo "<td>".$res['pais']."</td>\n";
                        echo "<td>".$res['cp']."</td>\n";
                        echo "<td>";
                        //En la última columna se añaden dos enlaces para editar y eliminar el registro correspondiente. Se le pasa por el método GET el id del registro
                        echo "<a href=\"edit.php?id=".$res['id']."\" class='btn btn-primary'>Editar</a>\n";
                        echo "<a href=\"delete.php?id=".$res['id']."\" class='btn btn-danger' onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\">Eliminar</a></td>\n";
                        echo "</tr>\n";
                    }
                    //Cierra la conexión de BD previamente abierta
                    mysqli_close($mysqli);
                    ?>
                </tbody>
            </table>
        </main>
        <footer class="mt-5">
            Created by ManuFdzDC &copy; 2024
        </footer>
    </div>

    <!-- Scripts de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
