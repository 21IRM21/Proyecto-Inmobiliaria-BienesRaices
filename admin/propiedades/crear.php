<?php
// Importar la conexión
require '../../includes/config/database.php';
conectarDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
      var_dump($_POST);
    echo "</pre>";
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
    <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo Propiedad</label>
            <input type="text" id="titulo" name="titulo" placeholder="Nombre propiedad">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad">

            <label for="imagen">Precio</label>
            <input type="file" id="imagen" name="imagen">

            <label for="descripcion">Descripción</label>
            <textarea type="text" id="descripcion" name="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Número de habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="ej: 3" min="1" max="9">

            <label for="wc">Número de baños</label>
            <input type="number" id="wc" name="wc" placeholder="ej: 3" min="1" max="9">

            <label for="estacionamientos">Número de Aparcamientos</label>
            <input type="number" id="estacionamientos" name="estacionamientos" placeholder="ej: 3" min="1" max="9">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <label for="vendedor">Vendedor</label>
            <select name="vendedor" id="vendedor" placeholder="--Seleccione--">
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