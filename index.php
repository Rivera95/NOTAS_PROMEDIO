<?php 


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