<?php

// Importar la conexión
require '../../includes/config/database.php';
$db = conectarDB();

//Validador de formulario
$errores = []; //se inicializa el array de errores

//Inicializa variables de los campos del formulario
$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$aparcamiento = "";
$vendedor = "";

//Ejecuta el código después de que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = $_POST["titulo"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $habitaciones = $_POST["habitaciones"];
    $wc = $_POST["wc"];
    $aparcamiento = $_POST["aparcamiento"];
    $vendedor = $_POST["vendedor"];

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
    if (!$vendedor) {
        $errores[] = "Debes añadir un vendedor";
    }

    // Solo se ejecuta el query si el array de errores está vacío
    if (empty($errores)) {

        $query = "INSERT INTO propiedades 
            (titulo, precio, descripcion, habitaciones, wc, aparcamiento, vendedor_id)
            VALUES 
            ('$titulo','$precio','$descripcion','$habitaciones','$wc','$aparcamiento','$vendedor')";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            echo "Insertado correctamente";
        } else {
            echo "Error al insertar";
        }
    }
}

/*INFORMACIÓN DEL SERVIDOR
   echo "<pre>";
      var_dump($_SERVER);
   echo "</pre>";*/

require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="prueba error">

            <?php echo $error; ?>

        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo Propiedad</label>
            <input type="text" id="titulo" name="titulo" placeholder="Nombre propiedad" value= "<?php echo $titulo ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value= "<?php echo $precio ?>">

            <label for="imagen">Precio</label>
            <input type="file" id="imagen" name="imagen">

            <label for="descripcion">Descripción</label>
            <textarea type="text" id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Número de habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="ej: 3" min="1" max="9" value= "<?php echo $habitaciones ?>">

            <label for="wc">Número de baños</label>
            <input type="number" id="wc" name="wc" placeholder="ej: 3" min="1" max="9">

            <label for="aparcamiento">Número de Aparcamientos</label>
            <input type="number" id="aparcamiento" name="aparcamiento" placeholder="ej: 3" min="1" max="9" value= "<?php echo $aparcamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <label for="vendedor">Vendedor</label>
            <select id="vendedor" name="vendedor" placeholder="--Seleccione--">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="1">Iván R.M.</option>
                <option value="2">Luke</option>
                <option value="3">Claud</option>
            </select>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>

</main>

<?php incluirTemplate('footer') ?>