<?php
// Importar las funciones
require '../includes/app.php';
USE App\Propiedad;

// Validar la sesión antes de permitir el acceso a la página. Viene de login.php
estaAutenticado();

//Implementar un método para obtener todas las propiedades
$propiedades = propiedad::all();
debuguear($propiedades);

//Eliminar un registro de propiedades
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {

        //Elimina el archivo de la carpeta imagenes
        $query = "SELECT imagen FROM propiedades WHERE id= {$id}";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $propiedad['imagen']);

        //Elimina una propiedad
        $query = "DELETE FROM propiedades WHERE id = {$id}";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            header('location: /admin?resultado=3');
        }
    }
}

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
        <p class="prueba exito">¡¡¡Propiedad Creada Correctamente!!!</p>
    <?php elseif (intval($mensaje) === 2): ?>
        <p class="prueba exito">¡¡¡Propiedad Actualizada Correctamente!!!</p>
    <?php elseif (intval($mensaje) === 3): ?>
        <p class="prueba error">¡¡¡Propiedad Eliminada Correctamente!!!</p>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

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
                    <td><?php echo number_format($propiedad['precio'], 0, ',', '.') . " €"; ?></td>                    <td>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block"> Actualizar</a>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


</main>

<?php
//Cerrar la conexion
mysqli_close($db);

incluirTemplate('footer')
?>