<?php
session_start();
//Inclusion des fichiers importants
require('filters/guest.php');
require_once ('functions/constants.php');
require_once ('functions/database.php');
require_once ('functions/functions.php');

if (!empty($_GET['c']))
{
    $id_categorie = e($_GET['c']);
    //Recuperation de l'id de la sous categorie passe dans le GET
    $id_sc = e($_GET['c']);
    //Verification si la categorie existe dans la bd
    $categorie = $db->prepare("SELECT * FROM f_categories WHERE id = ?");
    $categorie->execute([$id_categorie]);
    $count = $categorie->rowCount();

    if ($count)
    {
        $categorie = $categorie->fetch(PDO::FETCH_OBJ);
        $categorie = $categorie->nom;
        //Recuperation des sous categories
        $souscat = $db->prepare("SELECT * FROM f_soucategories WHERE id_categorie = ?");
        $souscat->execute([$id_categorie]);

        if (isset($_POST['submit']))
        {
            $id_souscat = e($_POST['souscat']);
            //on verifie si la sous categorie correspond a la categorie
            $verify_souscat = $db->prepare("SELECT id FROM f_soucategories WHERE id = ? AND id_categorie = ?");
            $verify_souscat->execute([$id_souscat, $id_categorie]);
            $verify_souscat = $verify_souscat->rowCount();

            if($verify_souscat)
            {
                extract($_POST);
                if (isset($sujet, $question))
                {
                    $sujet = e($sujet);
                    //$question = e($question);
                    $notif = isset($notif) ? 1 : 0;

                    $q = $db->prepare("INSERT INTO f_topics(id_createur, sujet, contenu, date_creation, notif_createur)
                        VALUES (:id_createur, :sujet, :contenu, NOW(), :notif_createur)");
                    $q->execute([
                        "id_createur" => $_SESSION['id'],
                        "sujet" => $sujet,
                        "contenu" => $question,
                        "notif_createur" => $notif,
                    ]);
                    //Recuperation de l'id du topic
                    $id_topic = $db->query("SELECT id FROM f_topics ORDER BY id DESC LIMIT 0,1");
                    $id_topic = $id_topic->fetch(PDO::FETCH_OBJ);
                    $id_topic = $id_topic->id;

                    $q = $db->prepare("INSERT INTO f_topic_categorie(id_topic, id_souscategorie, id_categorie) 
                          VALUES(:id_topic, :id_souscategorie, :id_categorie)");
                    $q->execute([
                        "id_topic" => $id_topic,
                        "id_souscategorie" => $id_souscat,
                        "id_categorie" => $id_categorie,
                    ]);

                    $q = $db->prepare("INSERT INTO f_suivis(id_user, id_topic) 
                        VALUES(:id_user, :id_topic)");
                    $q->execute([
                        "id_user" => $_SESSION['id'],
                        "id_topic" => $id_topic,
                    ]);
                    affiche_message("Votre Question a été postée !");
                    redirection("sms.php?t=".$id_topic);
                    affiche_message("Votre Question a été postée !");
                }
            }else{
                affiche_message("Aucune correspondance avec la sous categorie", "danger");
            }
        }
    }else{
        affiche_message("La categorie n'existe pas", "danger");
    }
}else{
    affiche_message("Cette categorie ndefinie", "danger");
}

?>

<?php require ('views/new.view.php'); ?>