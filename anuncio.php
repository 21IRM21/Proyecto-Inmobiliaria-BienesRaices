<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
 <?php
    // Importar la conexion de la base de datos
    include 'includes/config/database.php';
    $db = conectarDB();

    // Obtener el id
    $id = $_GET['id'] ?? null;

    // Validar el id
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id){
        header('location: /');
        exit;
    }

    // Consultar la base de datos
    $query = "SELECT * FROM propiedades WHERE id = $id";
    $resultado = mysqli_query ($db,$query);

    if(!$resultado->num_rows){ //si muestra un id no valido devuelve al index
        header('Location: /');
        exit;
    }
    ?>

    <main class="contenedor seccion contenido-centrado">
        <?php $propiedades= mysqli_fetch_assoc($resultado); ?>        
        <h1><?php echo $propiedades['titulo'] ?></h1>

            <img loading="lazy" src="imagenes/<?php echo $propiedades['imagen']; ?>" alt="imagen de la propiedad">
       

        <div class="resumen-propiedad">
            <p class="precio"><?php echo number_format($propiedades['precio'], 0, ',', '.') . " €"; ?></p>
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
            <p><?php echo $propiedades['descripcion'] ?></p>
        </div>


    </main>

<?php 
mysqli_close($db);
incluirTemplate('footer') 
?>