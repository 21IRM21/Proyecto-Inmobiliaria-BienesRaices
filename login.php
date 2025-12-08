<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Inicio Sesión</h1>
        <form action="" class="formulario">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail: </label>
                <input type="mail" placeholder="Tu e-mail" id="email">

                <label for="password">Password: </label>
                <input type="password" placeholder="Tu password" id="password">
            </fieldset>
        </form>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

    </main>
<?php incluirTemplate('footer') ?>