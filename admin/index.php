<?php

// Importar la conexion
require '../includes/config/database.php';
$db = conectarDB();

// Realizar la consulta
$query = "SELECT * FROM propiedades";

// Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);

// Importar las funciones
require '../includes/funciones.php';
incluirTemplate('header');
?>
<?php
$mensaje = $_GET['resultado'] ?? null;
/*echo "<pre>";
var_dump($mensaje);
echo "</pre>";*/
?>

<main class="contenedor seccion">
    <h1>Administrador Bienes Raices</h1>

    <!-- En el caso de que la validación del formulario haya sido correcta y resultado 
     sea igual a 1: -->
    <?php if (intval($mensaje) === 1): ?>
        <p class="prueba exito">Propiedad creada correctamente</p>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la casa" class="imagen-tabla"></td>
                    <td><?php echo $propiedad['precio'] . " €"; ?></td>
                    <td>
                        <a href="#" class="boton-amarillo-block"> Actualizar</a>
                        <a href="#" class="boton-rojo-block"> Eliminar</a>

                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


</main>

<?php
//Cerrar la conexion
mysqli_close($cb);

incluirTemplate('footer')
?>