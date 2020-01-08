<?php
session_start();
//Inclusion des fichiers importants
require('filters/guest.php');
require_once ('functions/constants.php');
require_once('functions/database.php');
require_once ('functions/functions.php');


if(!empty($_GET['t']))
{
    $id_topic = e($_GET['t']);
    //On verifie si l'id selectionne existe
    $topic = $db->prepare("SELECT * FROM f_topics WHERE id = ?");
    $topic->execute([$id_topic]);
    $count = $topic->rowCount();




    if ($count)
    {
        $topic = $topic->fetch(PDO::FETCH_OBJ);

        $autor = $db->prepare("SELECT * FROM f_users WHERE id = ?");
        $autor->execute([$topic->id_createur]);
        $autor = $autor->fetch(PDO::FETCH_OBJ);

        //Gestion de la pagination
        $reponse_par_page = 2;
        $total_rep_query = $db->prepare("SELECT id FROM f_messages WHERE id_topic = ?");
        $total_rep_query->execute([$id_topic]);
        $reponse_total = $total_rep_query->rowCount();
        $pages_total = ceil($reponse_total / $reponse_par_page);

        if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page']>0) {
            $page = intval($_GET['page']);
            $page_courante = $page;
        }else{
            $page_courante = 1;
        }

        $depart = ($page_courante - 1) * $reponse_par_page;

        //Recuperation des reponsesSELECT * FROM f_messages WHERE id_topic = ?
        //                    INNER JOIN f_users ON f_users.id = f_messages.id_posteur
        $reponses = $db->prepare("SELECT * FROM f_messages INNER JOIN f_users 
                          ON f_users.id = f_messages.id_posteur WHERE f_messages.id_topic = ? ORDER BY date_post DESC LIMIT ".$depart.",".$reponse_par_page);
        $reponses->execute([$id_topic]);

        //Recuperation des infos sur le membre connecte
        $user_connect = $db->prepare("SELECT * FROM f_users WHERE id = ?");
        $user_connect->execute([$_SESSION['id']]);
        $user_connect = $user_connect->fetch(PDO::FETCH_OBJ);
        //Verification si le sujet est resolu
        $q = $db->prepare("SELECT * FROM f_topics WHERE id = ? AND resolu = ?");
        $q->execute([$id_topic, 1]);
        $solved = $q->rowCount();
        // Gestion des reponses
        if(isset($_POST['submit_rep']))
        {
            if (isset($_SESSION['id']))
            {
                extract($_POST);
                if(!empty($reponse))
                {
                    $id_topic = e($_GET['t']);

                    $q = $db->prepare("INSERT INTO f_messages(id_topic, id_posteur, date_post, contenu)
                      VALUES (:id_topic, :id_posteur, NOW(), :contenu)");
                    $q->execute([
                        "id_topic" => $id_topic,
                        "id_posteur" => $_SESSION['id'],
                        "contenu" => $reponse,
                    ]);
                    redirection("sms.php?t=".$id_topic);
                }else{
                    die("Reponse vide ...");
                }
            }else{
                die("Vous n'etes pas connecté");
            }
        }
    }
    else{
        die("Erreur ....");
    }
}else{
    die("Introuvable");
}

?>


<?php require ('views/sms.view.php'); ?>



