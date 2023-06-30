<?php 

// BD
require "includes/config/database.php";
$db = conectarDB();

// VARIABLE
$error = [];

// SANITIZAR DATOS
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $notauno = mysqli_real_escape_string($db, $_POST['notauno']);
    $notados = mysqli_real_escape_string($db, $_POST['notados']);
    $notatres = mysqli_real_escape_string($db, $_POST['notatres']);

    if(!$notauno){
        $error [] = "por favor ingresa la nota 1";
    }
    if(!$notados){
        $error [] = "por favor ingresa la nota 2";
    }
    if(!$notatres){
        $error [] = "por favor ingresa la nota 3";
    }

    if(empty($error)){

        // QUERY
        $query = "INSERT INTO notas (notauno, notados, notatres) VALUES ('${notauno}', '${notados}', '${notatres}');";
        $respuesta = mysqli_query($db, $query);
        print_r($respuesta);
    }
}

// HEADER
require "includes/templates/header.php";

?>

<main>
    <div class="container">
        <div class="p-5"><h1>Crear notas</h1></div>

        <?php foreach($error as $err): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo ($err); ?>
            </div>
        <?php endforeach; ?>

        <form method="POST">
            <label for="notauno">Nota 1</label>
            <input type="num" id="notauno" name="notauno">

            <label for="notados">Nota 2</label>
            <input type="num" id="notados" name="notados">

            <label for="notatres">Nota 3</label>
            <input type="num" id="notatres" name="notatres">

            <input type="submit" class="btn btn-success"  value="Insertar Notas">
        </form>
    </div>
</main>
