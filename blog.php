<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">

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
                        <h4>Consejos para tener una piscina en casa</h4>
                        <p class="informacion-meta">Escrito el: <span>30/10/2025</span> por <span>admin</span></p>
                        <p>Consejos para disfutar de la piscina en la terraza de su casa con los mejores materiales
                            y un toque de lo más personal.</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog3.webp" type="image/webp">
                        <source srcset="build/img/blog3.jpeg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog3.jpg" alt="Texto entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>30/10/2025</span> por: <span>admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar
                            muebles y colores para darle vida a tu espacio.</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog4.webp" type="image/webp">
                        <source srcset="build/img/blog4.jpeg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog4.jpg" alt="Texto entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Decoración de interiores</h4>
                        <p class="informacion-meta">Escrito el: <span>30/10/2025</span> por: <span>admin</span></p>
                        <p>Consejos para dar un toque personal a tu espacio con materiales de primera calidad y más
                            bajos costes.</p>
                    </a>
                </div>
            </article>
        </section>

    </main>
    <?php @include 'includes/templates/footer.php' ?>