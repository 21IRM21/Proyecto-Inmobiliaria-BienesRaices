<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

<main class="contenedor seccion">
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
</main>

<section class="seccion contenedor">

    <h1>Casas y Apartamentos en Venta</h1>

    <section class="contenedor-anuncios">

        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio1.webp" type="img.webp">
                <source srcset="build/img/anuncio1.jpg" type="img.jpg">
                <img src="build/img/anuncio1.jpg" alt="imagen anuncio" loading="lazy">
            </picture>

            <div class="contenido-anuncio">
                <h3>Casa de Lujo en el Lago</h3>
                <p>Casa en el lago con excelentes vistas, acabados de lujo con increible precio</p>
                <p class="precio">3.000.000 €</p>

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

                <a href="anuncios.php" class="boton-amarillo-block">Ver Propiedad</a>
            </div><!--final contenido anuncio-->
        </div><!--final anuncio-->

        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio2.webp" type="img.webp">
                <source srcset="build/img/anuncio2.jpg" type="img.jpeg">
                <img src="build/img/anuncio2.jpg" alt="imagen anuncio" loading="lazy">
            </picture>

            <div class="contenido-anuncio">
                <h3>Casa Terminados de Lujo</h3>
                <p>Casa con diseño moderno, así como tecnología inteligente y amueblada</p>
                <p class="precio">2.000.000 €</p>

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

                <a href="anuncios.php" class="boton-amarillo-block">Ver Propiedad</a>
            </div><!--final contenido anuncio-->
        </div><!--final anuncio-->

        <div class="anuncio">
            <picture>
                <source srcset="build/img/anuncio3.webp" type="img.webp">
                <source srcset="build/img/anuncio3.jpg" type="img.jpg">
                <img src="build/img/anuncio3.jpg" alt="imagen anuncio" loading="lazy">
            </picture>

            <div class="contenido-anuncio">
                <h3>Casa con piscina</h3>
                <p>Casa con piscina y acabados de lujo en la ciudad, excelente oportunidad</p>
                <p class="precio">3.000.000 €</p>

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

                <a href="anuncios.php" class="boton-amarillo-block">Ver Propiedad</a>
            </div><!--final contenido anuncio-->
        </div><!--final anuncio-->

    </section><!--final contenedor-anuncios-->

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Rellena el formulario de contacto y en breve se pondrán en contacto</p>
    <a href="contacto.php" class="boton-amarillo">Contáctenos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpeg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>30/10/2025</span> por: <span>admin</span></p>
                    <p>Consejos para construir una terraza en el techo de su casa con los mejores materiales
                        y más bajos costos.</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpeg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>30/10/2025</span> por <span>admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar
                        muebles y colores para darle vida a tu espacio.
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimonios</h3>
        <div class="testimonial">
            <blockquote>
                El personal nos asesoró de una excelente forma y muy buena atención,
                nos ayudaron a encontrar La casa de nuestros sueños.
            </blockquote>
            <p>Iván R.M.</p>
        </div>
    </section>
</div><!--final contenedor-seccion-->


<?php incluirTemplate('footer') ?>