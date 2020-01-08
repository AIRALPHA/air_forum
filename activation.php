<?php
//Inclusion des fichiers importants
require('filters/guest.php');
require_once ('functions/constants.php');
require_once('functions/database.php');
require_once ('functions/functions.php');

if (!empty($_GET['p']) && in_database('pseudo', 'f_users', $_GET['p']) && !empty($_GET['tk']))
{
    $pseudo = $_GET['p'];
    $token = $_GET['tk'];

    $q = $db->prepare("SELECT email, password FROM f_users WHERE pseudo= ?");
    $q->execute([$pseudo]);
    $results = $q->fetch(PDO::FETCH_OBJ);

    $token_verif = sha1($pseudo.$results->password.$results->email);

    if ($token == $token_verif)
    {
        $q = $db->prepare("UPDATE f_users SET active = '1' WHERE pseudo = ?");
        $q->execute([$pseudo]);
        echo "Votre compte a ete active";
        redirection('login.php');
    }
    else
    {
        echo "Parametre Incorect";
        rediection("index.php");
    }

}
else
{
    redirection('index.php');
}