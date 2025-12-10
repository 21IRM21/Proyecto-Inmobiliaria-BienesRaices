<?php
//Inicio de sesión
if (!isset ($_SESSION)){
    session_start();
}
$auth = $_SESSION['login'] ?? null;
//var_dump($auth);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Bienes Raices</title>
</head>

<header class="header <?php echo $inicio ? 'inicio' : '' ?>">
    <div class="contenedor contenido-header">
        <div class="barra">
            <a href="/">
                <img src="/build/img/logo.svg" alt="Logotipo Bienes Raices">
            </a>

            <div class="mobile-menu">
                <img src="/build/img/barras.svg" alt="imagen menu responsive">
            </div>

            <div class="derecha">
                <img src="/build/img/dark-mode.svg" alt="imagen dark-mode" class="dark-mode-boton">
                <nav class="navegacion">
                    <a href="/nosotros.php">Nosotros</a>
                    <a href="/anuncios.php">Anuncios</a>
                    <a href="/blog.php">Blog</a>
                    <a href="/contacto.php">Contacto</a>
                    <?php if (!$auth): ?>
                        <a href="/login.php">Login</a>
                    <?php else: ?>
                        <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
            </div>
        </div> <!--cierre de la barra-->
        <?php
        if ($inicio) {
            echo "<h1>Venta de Casas y Apartamentos Exclusivos de Lujo</h1>";
        }
        ?>
    </div>
</header>