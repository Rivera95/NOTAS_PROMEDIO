<?php 

// BD
require "includes/config/database.php";
$db = conectarDB();

// ERROR
$error = [];

// SANITIZAR DATOS
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $nombre     = mysqli_real_escape_string($db, $_POST['nombre']);
  $apellido   = mysqli_real_escape_string($db, $_POST['apellido']);
  $telefono   = mysqli_real_escape_string($db, $_POST['telefono']);
  $correo     = mysqli_real_escape_string($db, $_POST['correo']);
  $id_cedula  = mysqli_real_escape_string($db, $_POST['id_cedula']);
  $cargo      = mysqli_real_escape_string($db, $_POST['cargo']);
  $password   = mysqli_real_escape_string($db, $_POST['password']);
  $fecha_creacion = date('Y/m/d');

  if(!$nombre){
    $error[] = "Debes insertar los datos NOMBRE";
  }
  if(!$apellido){
    $error[] = "Debes insertar los datos APELLIDO";
  }
  if(!$telefono){
    $error[] = "Debes insertar los datos TELEFONO";
  }
  if(!$correo){
    $error[] = "Debes insertar los datos CORREO";
  }
  if(!$id_cedula){
    $error[] = "Debes insertar los datos CEDULA";
  }
  if(!$cargo){
    $error[] = "Debes insertar los datos CARGO";
  }
  if(!$password){
    $error[] = "Debes insertar los datos PASSWORD";
  }

  // HASHEAR LA CONTRASEÑA
  $passHas = password_hash($password, PASSWORD_BCRYPT);
  // print_r($passHas);

  if(empty($error)){

    //QUERY
    $query = "INSERT INTO usuarios (id_cedula,nombre,apellido,telefono,correo,cargo,password,fecha_creacion)
              VALUES ('${id_cedula}', '${nombre}', '${apellido}', '${telefono}', '${correo}', '${cargo}', '${passHas}', '${fecha_creacion}');";
              // print_r($query);
    $resultado = mysqli_query($db, $query);

    //REDIRECCIONAR
    if($resultado){
      header('Location: /index.php');
    }
  }
}
require "includes/templates/header.php";
?>


<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-header">Registrarse</div>
                    <div class="card-body">
                        <h4 class="card-title">Bienvenido por favor ingresa los datos</h4>

                        <?php foreach($error as $err): ?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo ($err); ?>
                          </div>
                        <?php endforeach; ?>

                        <form action="registrar.php" method="POST">
                          <div class="row">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre">

                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="apellido">

                            <label for="telefono">Telefono</label>
                            <input type="text" id="telefono" name="telefono">

                            <label for="correo">Correo</label>
                            <input type="text" id="correo" name="correo">

                            <label for="id_cedula">Cedula</label>
                            <input type="text" id="id_cedula" name="id_cedula">

                            <label for="cargo">Cargo</label>
                            <input type="text" id="cargo" name="cargo">

                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password">
                        
                            <input type="submit" class="btn btn-primary" value="Ingresar">
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>