<?php
session_start();
//Inclusion des fichiers importants
require('filters/guest.php');
require_once ('functions/constants.php');
require_once('functions/database.php');
require_once ('functions/functions.php');

//$topics = $db->query("SELECT * FROM f_topics ORDER BY id DESC");
if (isset($_GET['c']))
{
    $id_categorie = e($_GET['c']);
    if (!empty($id_categorie))
    {
        $q = "SELECT *, f_topics.id AS id_topic from f_topics LEFT JOIN f_topic_categorie ON
            f_topics.id = f_topic_categorie.id_topic LEFT JOIN f_categories
            ON f_topic_categorie.id_categorie = f_categories.id LEFT JOIN
            f_soucategories ON f_topic_categorie.id_souscategorie = f_soucategories.id
            LEFT JOIN f_users ON f_users.id = f_topics.id_createur
            WHERE f_categories.id = ?";
        //verification s'il exite la sous categories por l'indique dans la requete
        if(!empty($_GET['sc'])){
            $id_souscategorie = e($_GET['sc']);
            $q = $q." AND f_soucategories.id = ?";
            $values = [$id_categorie, $id_souscategorie];
        }else{
            $values = [$id_categorie];
        }

        //Recuperer les topic
        $topics = $db->prepare($q);
        $topics->execute($values);



    }else{
        die("Categorie introuvable");
    }
}
else {
    die("Aucune categories selectionée");
}


?>

<?php require ('views/topic.view.php'); ?>