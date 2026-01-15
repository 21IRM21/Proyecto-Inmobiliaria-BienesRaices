<?php

// Importar las funciones
require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

// $propiedad = new Propiedad;
// debuguear($propiedad);

// Validar la sesión antes de permitir el acceso a la página.
estaAutenticado();

// Conectar a la base de datos
$db = conectarDB();

//Obtener vendores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores
$errores = Propiedad::getErrores();

//Inicializa variables de los campos del formulario
$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$aparcamiento = "";
$vendedorId = "";
$creado = date('Y/m/d');

//Ejecuta el código después de que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     //Crear una nueva instancia de propiedad
        $propiedad = new Propiedad($_POST);

        //Generar nombre único
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        if($_FILES ['imagen']['tmp_name']){
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES ['imagen']['tmp_name'])->cover(800,600);
            //debuguear($image);
            $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validar(); 


    // Solo se ejecuta el query si el array de errores está vacío
    if (empty($errores)) {                        

        /**SUBIDA DE ARCHIVOS*/    

        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        //Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);
        
        //Generar nombre único
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
        $resultado = $propiedad->guardar();
        //debuguear($propiedad);
        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin?resultado=1'); //Con resultado 1 indicamos que la propiedad se registró correctamente y
            //lo pasamos a la url mediante GET.
            exit;
        }
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear Propiedades</h1>
    <a href="/admin/index.php" class="boton boton-verde">Ver Propiedades</a>

    <?php foreach ($errores as $error) : ?>
        <div class="prueba error">

            <?php echo $error; ?>

        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo Propiedad</label>
            <input type="text" id="titulo" name="titulo" placeholder="Nombre propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción</label>
            <textarea type="text" id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Número de habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="ej: 3" min="1" max="9" value="<?php echo $habitaciones ?>">

            <label for="wc">Número de baños</label>
            <input type="number" id="wc" name="wc" placeholder="ej: 3" min="1" max="9">

            <label for="aparcamiento">Número de Aparcamientos</label>
            <input type="number" id="aparcamiento" name="aparcamiento" placeholder="ej: 3" min="1" max="9" value="<?php echo $aparcamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <label for="vendedor">Vendedor</label>
            <select id="vendedor_id" name="vendedor_id" placeholder="--Seleccione--">
                <option value="" disabled selected>--Seleccione--</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId == $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>">
                        <?php echo $row['nombre'] . " " . $row['apellidos']; ?>
                    </option>

                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>

</main>

<?php incluirTemplate('footer') ?>