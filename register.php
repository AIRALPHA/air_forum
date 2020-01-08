<?php
session_start();
//Inclusion des fichiers importants
require('filters/login.php');
require_once ('functions/constants.php');
require_once('functions/database.php');
require_once ('functions/functions.php');

if (isset($_POST['register']))
{
    extract($_POST);

    if (isset($pseudo, $email, $password, $password_confirm, $confidentialite))
    //if(isset($pseudo) && isset($email) && isset($password) && isset($password_confirm) && isset($confidentialite))
    {
        $errors = [];

        //Verification du pseudo
        if(mb_strlen($pseudo) < 4)
        {
            $errors[] = "Votre pseudo doit avoir au mois 4 characteres";
        }

        //Verification de email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $errors[] = "Votre adresse e-mail doit etre correcte";
        }

        //Verification du password
        if(mb_strlen($password) < 6)
        {
            $errors[] = "Votre mot de passe doit avoir au moins 6 characteres";
        }

        //Verification du password
        if($password != $password_confirm)
        {
            $errors[] = "Vos deux mots de passe doivent etre identique";
        }

        //Ici on verifie les doublons
        if(in_database('pseudo', 'f_users', $pseudo))
        {
            $errors[] = "Pseudo deja existant";
        }
        if(in_database('email', 'f_users', $email))
        {
            $errors[] = "E-mail deja existant";
        }
        //verification des erreurs
        if(empty($errors))
        {
            //On envoie le mail
            $password = sha1($password);
            $token = sha1($pseudo.$password.$email);
            $to = $email;
            $subject = WEBSITE_NAME.' - ACTIVATION DE COMPTE';

            ob_start();
            require("partials/mail.php");
            $content = ob_get_clean();

            $headers = "MIME-Version 1.0". "\r\n";
            $headers .= "content-type:text/html; charset='utf-8'". "\r\n";

            //Envoi du mail
            mail($to, $subject, $content, $headers);
            //On crypte le mot de passe


            $q = $db->prepare("INSERT INTO f_users(pseudo, email, password, create_at) 
            VALUES(:pseudo, :email, :password, NOW())");
            $q->execute([
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'password' => $password,
            ]);
        }
        else
        {
            ?>
                <div class="alert alert-danger alert-dismissible col-md-6 offset-1" role="alert">
                    <h4 class="alert-heading">Erreur !!</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-window-close"></i></span>
                    </button>
                    <p>
                        <ul>
                        <?php
                         foreach ($errors as $error)
                            {
                            ?>
                                <li><?= $error; ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </p>
                    <hr>
                    <p class="mb-0">Veuillez les corriger pour continuer SVP !</p>
                </div>
            <?php
        }
    }
    else
    {
        echo "Veuillez remplir tout les champs";
    }
}
else
{
    $pseudo = ""; $email = "";
}


?>

<?php require ('views/register.view.php'); ?>
