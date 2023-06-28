<?php 

// BD
require "includes/config/database.php";
$db = conectarDB();

// Variable vacia
$error = [];

// SANITIZAR DATOS
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id_cedula = mysqli_real_escape_string($db, $_POST['id_cedula']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$id_cedula){
        $error [] = "Por favor ingresar la cedula correcta"; 
    }
    if(!$password){
        $error [] = "Por favor ingresa una contraseña correcta";
    }

    if(empty($error)){

        // QUERY
        $query = "SELECT * FROM usuarios WHERE id_cedula = '${id_cedula}'";
        $resul = mysqli_query($db, $query);
        // print_r($resul);

        if($resul->num_rows){
            // PASSWORD
            $regisUsuario = mysqli_fetch_assoc($resul);
            //VALIDAR PASSWORD
            $auth = password_verify($password, $regisUsuario['password']);
            // print_r($auth);

            if($auth){
                //INICIAR
                session_start();

                //LLENAR ARREGLO
                $_SESSION['usuario'] = $regisUsuario['id_cedula'];
                $_SESSION['nomusuario'] = $regisUsuario['nombre'];
                $_SESSION['apeusuario'] = $regisUsuario['apellido'];
                $_SESSION['login'] = true;
                print_r($_SESSION);

                header('Location: /inicio.php');
            }
        }

    }
}


require "includes/templates/header.php";

?>

<main>
    <div class="container">
        <div class="p-5"><h1>Iniciar Sesión</h1></div>

        <?php foreach($error as $err): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo ($err); ?>
            </div>
        <?php endforeach; ?>

        <form method="POST">
            <label for="id_cedula">Cedula</label>
            <input type="text" id="id_cedula" name="id_cedula">

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password">

            <input type="submit" class="btn btn-primary"  value="Ingresar">
        </form>
    </div>
</main>