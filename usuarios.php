<?php

//OJO CON ESTE ARCHIVO, DEBERÍA ELIMINARSE DESPUES DE CREAR AL USUARIO ADMINISTRADOR

// Importar la base de datos
require 'includes/config/database.php';
$db = conectarDB();

// Crear un usuario y una contraseña
$email = 'correo@correo.com';
$password = '123456';

// Hashear la contraseña
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Crear un Query
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";
//echo $query;

// Subirlo a la base de datos
mysqli_query($db, $query);
echo "Usuario Creado Correctamente!!!!";

?>