<?php
// Inicio de sesión
if (isset($_SESSION) === false) {
    session_start();
}
// Destruir la sesión
$_SESSION = [];
header ('Location: /');

?>