<?php
$title = "Forum ● Nouveau";
require ('partials/header.php');
require ('partials/nav.php'); ?>

<div class="container">
    <form method="POST" class="card bg-dark text-light" style="margin-bottom: 10px;">
        <div class="card-header text-primary font-weight-bold text-uppercase">
            Nouveau Sujet
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="sujet" class="col-sm-2 col-form-label">Sujet : </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Le sujet !">
                </div>
            </div>
            <div class="form-group row">
                <label for="categorie" class="col-sm-2 col-form-label">Categorie : </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled="disabled" name="categorie" id="categorie" value="<?= $categorie; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="souscat" class="col-sm-2 col-form-label">Sous Categorie : </label>
                <div class="col-sm-10">
                    <select class="form-control" name="souscat" id="souscat">
                        <?php while ($sc = $souscat->fetch(PDO::FETCH_OBJ)){ ?>
                        <option value="<?= $sc->id; ?>" <?= ($sc->id == $id_sc) ? "selected = 'selected'" : ""; ?>><?= $sc->nom; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-sm-2 col-form-label">Votre Message !</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="question" id="message" rows="10" placeholder="Votre Message"></textarea>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="notif" type="checkbox" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Me notifier par mail
                </label>
            </div>
            <br>
            <input type="submit" name="submit" value="Poster le message" class="btn btn-primary"></input>
        </div>
    </form>

</div>

<?php require ('partials/footer.php'); ?>