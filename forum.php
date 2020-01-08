<?php
session_start();
//Inclusion des fichiers importants
require('filters/guest.php');
require_once ('functions/constants.php');
require_once ('functions/database.php');
require_once ('functions/functions.php');

    $categories = $db->query("SELECT * FROM f_categories ORDER BY id");
    $souscat = $db->prepare("SELECT * FROM f_soucategories WHERE id_categorie = ? ORDER BY nom");
    //Pour les derniers messages


?>

<?php require ('views/forum.view.php'); ?>