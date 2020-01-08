<?php
session_start();
//Inclusion des fichiers importants
require('filters/guest.php');
require_once ('functions/constants.php');
require_once('functions/database.php');
require_once ('functions/functions.php');

if (!empty($_GET['t']))
{
    $id_topic = e($_GET['t']);
    //Verification si l'utilisateur n'a pas encore like le sujet
    $q = $db->prepare("SELECT * FROM f_like WHERE id_topic = ? AND id_user = ?");
    $q->execute([$id_topic, $_SESSION['id']]);
    $count = $q->rowCount();

    if (!$count){
        $q = $db->prepare("INSERT INTO f_like (id_user, id_topic) 
              VALUES (:id_user, :id_topic)");
        $q->execute([
            "id_user" => $_SESSION['id'],
            "id_topic" => $id_topic,
        ]);

        redirection("sms.php?t=".$id_topic);
    }else{
        redirection("sms.php?t=".$id_topic);
    }
}
