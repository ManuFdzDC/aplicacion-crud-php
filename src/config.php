<?php

define('DB_HOST', 'mariadb');
define('DB_NAME', 'cliente');
define('DB_USER', 'manuel');
define('DB_PASSWORD', 'manuel');

//Abre una nueva conexión al servidor MySQL/MariaDB
$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Devuelve una descripción del último error producido en la conexión a la BD
if (mysqli_connect_errno()) {
    printf('Falló la conexión: %s\n', mysqli_connect_error());
    exit();
}

?>