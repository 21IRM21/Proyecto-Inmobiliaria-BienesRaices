<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bienesraices_crud');

function conectarDB() {
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (!$db) {
        echo "Error en la conexión";
        exit; // opcional pero recomendado
    }

    // Opcional: quitar el echo cuando ya esté en producción
    //echo "Conexión exitosa";

    return $db;
}
