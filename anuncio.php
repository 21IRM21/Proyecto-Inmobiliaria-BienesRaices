<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="img.webp">
            <source srcset="build/img/destacada.jpg" type="img.jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">3.000.00€</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono wc" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio" loading="lazy">
                    <p>4</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde fuga ipsam mollitia qui
                molestias odio enim aliquid eos dolore quod! Magni ut aspernatur hic quam consequatur
                similique quos autem enim? Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Sit amet consectetur adipisicing elit. Unde fuga ipsam mollitia qui
                molestias odio enim aliquid eos dolore quod! Magni ut aspernatur hic quam consequatur
                similique quos autem enim?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde fuga ipsam
                mollitia molestias odio enim aliquid eos dolore quod! Magni ut aspernatur hic quam consequatur
                similique quos autem enim? Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Soluta deleniti ipsam qui pariatur alias. Quam atque itaque nisi expedita aspernatur
                dolor corrupti quis quae consequatur rem, soluta doloremque culpa labore?</p>
        </div>


    </main>

<?php @include 'includes/templates/footer.php' ?>