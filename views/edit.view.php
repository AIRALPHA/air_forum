<?php
$title = "Forum ● Edition";
require ('partials/header.php');
require ('partials/nav.php'); ?>

<form method="POST" class="card alert-dark" style="margin-bottom: 10px;">
    <div class="card-header text-primary font-weight-bold text-uppercase">
        Editer votre message
    </div>
    <div class="card-body" id="repondre">
        <div class="form-group">
            <label for="editer">Modification !</label>
            <textarea class="form-control" name="editer" id="editer" rows="10"><?= $content->contenu; ?></textarea>
        </div>
        <br>
        <input type="submit" name="submit_edit" value="Valider" class="btn btn-primary">
    </div>
</form>


<?php require ('partials/footer.php'); ?>
