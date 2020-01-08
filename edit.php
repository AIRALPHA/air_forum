<?php
session_start();
//Inclusion des fichiers importants
require('filters/guest.php');
require_once ('functions/constants.php');
require_once('functions/database.php');
require_once ('functions/functions.php');

    $id_topic = e($_GET['t']);

    //Recuperation de du sujet courant
    $q = $db->prepare("SELECT contenu FROM f_topics WHERE id = ?");
    $q->execute([$id_topic]);
    $content = $q->fetch(PDO::FETCH_OBJ);

    if (isset($_POST['submit_edit']))
    {
        extract($_POST);

        $q = $db->prepare("UPDATE f_topics SET contenu = :contenue WHERE id = :id_t");
        $q->execute([
            "contenue" => $editer,
            "id_t" => $id_topic
        ]);

        redirection("sms.php?t=".$id_topic);
    }

?>


<?php require ('views/edit.view.php'); ?>