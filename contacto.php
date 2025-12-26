<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>

        <picture>
            <source srcset="buid/img/destacada3.webp" type="img/webp">
            <source srcset="buid/img/destacada3.jpg" type="img/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen xontacto">
        </picture>
        <h2>Rellene el formulario de contacto</h2>

        <form action="" class="formulario">

            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre: </label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">E-mail: </label>
                <input type="mail" placeholder="Tu e-mail" id="email">

                <label for="telefono">Teléfono: </label>
                <input type="tel" placeholder="Tu teléfono" id="telefono">

                <label for="mensaje">Mensaje: </label>
                <textarea name="mensaje" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la Propiedad</legend>

                <label for="opciones">Compra o Vende </label>
                <select name="compra-vende" id="compra-vende">
                    <option value="seleccion" disabled selected>--seleccionar--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="precio">Cantidad: </label>
                <input type="number" id="precio" placeholder="Tu precio o presupuesto">

            </fieldset>
            <fieldset>
                <legend>Contacto</legend>

                <p>¿Como desea ser contactado?</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elija fecha y hora</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="9:00" max="20:00">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>

    </main>
    <?php incluirTemplate('footer') ?>