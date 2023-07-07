<?php 

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
