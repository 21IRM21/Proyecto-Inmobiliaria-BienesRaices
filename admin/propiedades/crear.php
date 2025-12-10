<?php
// Importar las funciones
require '../../includes/funciones.php';

// Validar la sesión antes de permitir el acceso a la página. Viene de login.php
$auth = estaAutenticado();

if (!$auth) {
    header('Location: /');
}

// Importar la conexión
require '../../includes/config/database.php';
$db = conectarDB();

//Obtener vendores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//Validador de formulario
$errores = []; //se inicializa el array de errores

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

    // echo "<pre>";
    // var_dump($_POST);
    // echo "<pre>";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "<pre>";
    //exit;

    $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
    $precio = mysqli_real_escape_string($db, $_POST["precio"]);
    $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
    $habitaciones = mysqli_real_escape_string($db, $_POST["habitaciones"]);
    $wc = mysqli_real_escape_string($db, $_POST["wc"]);
    $aparcamiento = mysqli_real_escape_string($db, $_POST["aparcamiento"]);
    $vendedorId = mysqli_real_escape_string($db, $_POST["vendedor"] ?? '');

    //Asignar files hacia una variable
    $imagen = $_FILES["imagen"];

    //var_dump($imagen);
    //exit;


    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }
    if (strlen($descripcion) < 20) {
        $errores[] = "Debes añadir una descripción de al menos 20 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir el número de habitaciones";
    }
    if (!$wc) {
        $errores[] = "Debes añadir número de wc";
    }
    if (!$aparcamiento) {
        $errores[] = "Debes añadir número de estacionamientos";
    }
    if (!$vendedorId) {
        $errores[] = "Debes añadir un vendedor";
    }
    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "Debes añadir una imagen";
    }

    //Validación de imagen subida (1mb)
    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen tiene un tamaño demasiado grande";
    }

    // Solo se ejecuta el query si el array de errores está vacío

    if (empty($errores)) {

        /**SUBIDA DE ARCHIVOS*/
        //Crear carpeta
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        //Generar nombre único
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        //Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


        $query = "INSERT INTO propiedades 
            (titulo, precio, imagen, descripcion, habitaciones, wc, aparcamiento, creado, vendedor_id)
            VALUES 
            ('$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$wc','$aparcamiento', '$creado','$vendedorId')";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin?resultado=1'); //Con resultado 1 indicamos que la propiedad se registró correctamente y
                                                            //lo pasamos a la url mediante GET.
        }
    }
}

/*INFORMACIÓN DEL SERVIDOR
   echo "<pre>";
      var_dump($_SERVER);
   echo "</pre>";*/

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
            <select id="vendedor" name="vendedor" placeholder="--Seleccione--">
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