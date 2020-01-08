<?php
$title = "Accueil";
require ('partials/header.php');
require ('partials/nav.php'); ?>

<body>
       <div class="container" style="font-size: 1.12em;">
            <div class="row">
                <div class="jumbotron col-md-8">
                    <h1><?= WEBSITE_NAME; ?> ?</h1>
                    <p style="font-style: italic;">
                        AIR FORUM est un forum associé au site <a href="air.com">AIR ALPHA</a>. <br />
                        C'est un forum d'entraide a sur les langages, outils et technologies pour mieux cerner <br>
                        le monde de la programmation. Grâce à cette plateforme, vous avez la possibilité d'etre aider
                        <br> et d'aider d'autres personnes sur plusieurs domaines et sur divers projets.<br />
                        Alors n'hésitez plus et <a href="register.php">rejoignez dès maintenant la communaute </a>! ☺<br />
                    </p>
                    <a href="register.php" class="btn btn-outline-primary btn-lg">Je m'inscris ✔</a>
                </div>
                <div>

                </div>
            </div>

        </div><!-- /.container -->
</body>
<?php require ('partials/footer.php'); ?>