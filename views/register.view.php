<?php
$title = "Inscription";
require ('partials/header.php');
require ('partials/nav.php'); ?>

<div class="container">
    <a href="" class="font-weight-bold">Politique</a>
    <div class="jumbotron border border-dark col-md-6">
        <h1 class="lead text-center font-weight-normal text-dark">Devenir membres !</h1>
        <form action="" method="POST">
            <!-- Pseudo -->
            <div class="form-group">
                <label for="pseudo" class="font-weight-bold"><i class="fas fa-user"></i> Pseudo : </label>
                <input type="text" name="pseudo" value="<?php get_input($pseudo) ?>" class="form-control" id="pseudo" placeholder="Votre Pseudo" required="required">
            </div>
            <!-- email field -->
            <div class="form-group">
                <label class="font-weight-bold" for="email"><i class="fas fa-envelope"></i> Adresse Email : </label>
                <input type="text" name="email" value="<?php get_input($email) ?>" id="email" class="form-control" placeholder="Votre Adresse Electronique" required="required">
            </div>
            <!-- password field -->
            <div class="form-group">
                <label for="password" class="font-weight-bold"><i class="fas fa-lock"></i> Mot de passe : </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe" required="required">
            </div>
            <!-- password confirmation field -->
            <div class="form-group">
                <label for="password_confirm" class="font-weight-bold"><i class="fas fa-lock"></i> Confirmer votre mot de passe : </label>
                <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Confirmer votre mot de passe" required="required">
            </div>
            <div class="form-group">
                <input type="checkbox" <?php echo isset($confidentialite) ? 'checked="checked"' : ''; ?> name="confidentialite" id="confidentialite" required="required">
                <label for="confidentialite" class="font-weight-bold">J'acepte la politique</label>
            </div>
            <input  type="reset" class="btn btn-danger float-lg-left" value="Annulé ✘"/>
            <input  type="submit" name="register" class="btn btn-primary float-lg-right" value="Inscription ✓"/>
        </form>
    </div>
</div>

<?php require ('partials/footer.php'); ?>
