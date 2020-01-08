<?php
$title = "Connexion";
require ('partials/header.php');
require ('partials/nav.php'); ?>


<div class="container">
    <div class="jumbotron border border-dark col-md-6">
        <h1 class="lead text-center font-weight-normal text-dark">Connexion</h1>
        <form method="POST" action="">
            <!-- Name -->
            <div class="form-group">
                <label for="pseudo" class="font-weight-bold"><i class="fas fa-user"></i> Pseudo : </label>
                <input type="text" name="pseudo" value="<?php get_input($pseudo); ?>" class="form-control" id="pseudo" placeholder="Votre pseudo">
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="password" class="font-weight-bold"><i class="fas fa-lock"></i> Password : </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe">
            </div>
            <a href="" class="">Mot de passe oublié ?</a>
            <br>
            <button type="submit" name="submit" class="btn btn-primary float-md-right"><i class="fas fa-check-circle fa-spin"></i> Connexion</button>
        </form>
    </div>
</div>

<?php require ('partials/footer.php'); ?>
