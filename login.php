<?php
session_start();
//Inclusion des fichiers importants
require('filters/login.php');
require_once ('functions/constants.php');
require_once('functions/database.php');
require_once ('functions/functions.php');

    if (isset($_POST['submit']))
    {
        extract($_POST);

        if(isset($pseudo, $password))
        {
            $q = $db->prepare("SELECT id, pseudo FROM f_users WHERE (pseudo = :pseudo 
                      AND password = :password AND active = '1')");
            $q->execute([
                'pseudo' => $pseudo,
                'password' => sha1($password),
            ]);
                $find = $q->rowCount();

            if($find)
            {
                $result = $q->fetch(PDO::FETCH_OBJ);
                $_SESSION['id'] = $result->id;
                $_SESSION['pseudo'] = $result->pseudo;

                redirection("profil.php");
            }
            else
            {
                affiche_message("Pseudo ou mot de passe incorrecte", "danger");
            }
        }
        else
        {
            affiche_message("Veuillez remplir tout les champs", "danger");
        }
    }
    else
    {
        $pseudo = "";
    }
?>

<?php require ('views/login.view.php'); ?>
