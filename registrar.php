<?php 

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