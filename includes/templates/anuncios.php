<?php 
// Importar la conexión de la base de datos
require __DIR__ . '/../config/database.php';
$db = conectarDB();

// Consultar base de datos
$query ="SELECT * FROM propiedades LIMIT $limite";

// Obtener resultados de la consulta
$resultado = mysqli_query($db,$query);

?>
<div class="contenedor-anuncios">

    <?php while($propiedades = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">

                <img src="imagenes/<?php echo $propiedades['imagen'] ?>" alt="imagen anuncio" loading="lazy">           

            <div class="contenido-anuncio">
                <h3><?php echo $propiedades['titulo'] ?></h3>
                <p><?php echo substr($propiedades['descripcion'], 0, 60) . '...'; ?></p>

                <p class="precio"><?php echo $propiedades['precio'] ?> €</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="Icono wc" loading="lazy">
                        <p><?php echo $propiedades['wc'] ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy">
                        <p><?php echo $propiedades['aparcamiento'] ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio" loading="lazy">
                        <p><?php echo $propiedades['habitaciones'] ?></p>
                    </li>
                </ul>
   
                <a href="anuncio.php?id=<?php echo $propiedades['id'] ?>" class="boton-amarillo-block">Ver Propiedad</a>
            </div><!--final contenido anuncio-->
        </div><!--final anuncio-->
    <?php endwhile; ?>       

    </><!--final contenedor-anuncios-->
</div>
    <?php
    // Cerrar la conexion
    mysqli_close($db);
    ?>