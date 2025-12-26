<?php 
require 'includes/app.php';
incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="img/webp">
                    <source srcset="build/img/nosotros,jpg" type="img/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre-nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate eaque excepturi tempore,
                    rerum sed quos at! Officia enim hic adipisci at ratione, officiis totam repudiandae,
                    accusamus, vel consequatur consectetur asperiores!</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque rem, eveniet necessitatibus
                    obcaecati debitis excepturi quas repudiandae quibusdam et quia laboriosam nobis,
                    accusantium voluptas pariatur reprehenderit. Sapiente ad necessitatibus sequi.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Impedit quae eos eligendi nostrum sequi rem quas ipsum ipsa, est quam accusamus deleniti,
                    laboriosam nobis perferendis adipisci aliquam facilis.
                    Libero, reprehenderit. Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Unde obcaecati accusamus corrupti quas sed earum placeat repudiandae veritatis numquam labore.
                    Amet nulla unde sequi quasi id magnam ad ea qui.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde fuga ipsam mollitia qui
                    molestias odio enim aliquid eos dolore quod! Magni ut aspernatur hic quam consequatur
                    similique quos autem enim?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde fuga ipsam mollitia qui
                    molestias odio enim aliquid eos dolore quod! Magni ut aspernatur hic quam consequatur
                    similique quos autem enim?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono a tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde fuga ipsam mollitia qui
                    molestias odio enim aliquid eos dolore quod! Magni ut aspernatur hic quam consequatur
                    similique quos autem enim?</p>
            </div>
        </div>
    </section>

    <?php @include 'includes/templates/footer.php' ?>