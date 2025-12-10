<?php
// Importar conexion
require 'includes/config/database.php';
$db = conectarDB();

// Autenticar el usuario
$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //echo "<pre>";
    //var_dump($_POST);
    //echo "</pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    //var_dump( $email);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El mail es obligatorio o no es válido";
    }
    if (!$password) {
        $errores[] = "El password es obligatorio";
    }
    if (empty($errores)) {
        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);
        //echo "<pre>";
        //var_dump($resultado);
        //echo "</pre>";
        if ($resultado->num_rows) {
            //Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            //var_dump($usuario);
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                // El usuario está autenticado
                session_start();
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                //var_dump($_SESSION);
                header('Location: /admin');

            } else {
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

?>
<?php
// Template header
require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Inicio Sesión</h1>

    <?php foreach ($errores as $error): ?>
        <div class="prueba error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail: </label>
            <input type="mail" placeholder="Tu e-mail" name="email" id="email">

            <label for="password">Password: </label>
            <input type="password" placeholder="Tu password" name="password" id="password">
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>


</main>
<?php incluirTemplate('footer') ?>