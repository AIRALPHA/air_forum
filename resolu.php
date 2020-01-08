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

    $q = $db->prepare("UPDATE f_topics SET resolu = ? WHERE id = ?");
    $q->execute([1, $id_topic]);

    redirection("sms.php?t=".$id_topic);
}