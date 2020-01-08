
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <!-- <a class="navbar-brand" href="index.php"><img src="assets/img/air.png" alt=""></a> -->
    <a class="navbar-brand" href="index.php"><?= WEBSITE_NAME ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- navbar navbar-expand-lg navbar-dark bg-dark fixed-top -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-md-auto">
            <?php if(is_loggin()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="forum.php"><i class="fab fa-blogger"></i> Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php"><i class="fas fa-user"></i> Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><i class="fas fa-phone"></i> Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fas fa-window-close"></i> Deconnexion</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fas fa-check-square"></i> Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php"><i class="fas fa-check-square"></i> Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><i class="fas fa-phone"></i> Contacts</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>