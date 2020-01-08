<?php

//function not_empty($fields = [])
//{
//        if(count($fields) != 0)
//        {
//            foreach ($fields as $field)
//            {
//                if(empty($field) || trim($field) == "")
//                {
//                    return false;
//                }
//            }
//            return true;
//        }
//}

    function in_database($champ, $table, $value)
    {
        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $champ = ?");
        $q->execute([$value]);

        $count = $q->rowCount();

        $q->closeCursor();
        return $count;
    }

    function get_input($champ)
    {
        echo isset($champ) ? $champ :  "";
    }

    function redirection($page)
    {
        header("Location:".$page);
        exit();
    }

    function affiche_message($message, $class="info")
    {
        echo "<div class='alert alert-".$class." alert-dismissible fade show' role='alert'>
            ". $message ."
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'><i class='fas fa-window-close'></i></span>
            </button>
        </div>";
    }

    function is_loggin()
    {
        return (isset($_SESSION['id'], $_SESSION['pseudo'])) ? true : false;
    }

    function e($var)
    {
        return htmlentities($var);
    }

    function get_pseudo($par)
    {
        global $db;
        $pseudo = $db->prepare("SELECT pseudo FROM f_users WHERE id = ?");
        $pseudo->execute([$par]);
        $pseudo = $pseudo->fetch(PDO::FETCH_OBJ);
        return $pseudo->pseudo;
    }

    function nbr_messages_catego($id_catego)
    {
        global $db;
        $nbr = $db->prepare("SELECT id FROM f_topic_categorie WHERE id_categorie = ?");
        $nbr->execute([$id_catego]);
        $nbr = $nbr->rowCount();
        return $nbr;
    }

//    function nbr_reponses_souscat($sc)
//    {
//        global $db;
//        $nbr = $db->
//    }
    function set_level($niveau)
    {
        if ($niveau == "Debutant"){
            echo '<span class="badge badge-primary">'.$niveau.' <i class="fas fa-star"></i></span>';
        }
        elseif ($niveau == "Moyen"){
            echo '<span class="badge badge-success">'.$niveau.' <i class="fas fa-star"></i><i class="fas fa-star"></i></span>';
        }
        elseif ($niveau == "Professionel"){
            echo '<span class="badge badge-danger">'.$niveau.' <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>';
        }
        else{
            echo '<span class="badge badge-warning">Amateur *</i></span>';
        }
    }

    function sms_suivie($id_user)
    {
        global $db;

        $sms = $db->prepare("SELECT * FROM f_suivis WHERE id_user = ?");
        $sms->execute([$id_user]);
        $sms = $sms->rowCount();
        if ($sms > 0 && $sms <= 4){
            echo '<span class="badge badge-primary">'.$sms.'</span>';
        }
        if ($sms > 4 && $sms <= 10){
            echo '<span class="badge badge-success">'.$sms.'</span>';
        }
        if ($sms > 10){
            echo '<span class="badge badge-danger">'.$sms.'</span>';
        }
    }

    function set_number_like($id_topic)
    {
        global $db;
        $q = $db->prepare("SELECT * FROM f_like WHERE id_topic = ?");
        $q->execute([$id_topic]);
        $nbr = $q->rowCount();

        return $nbr;
    }

    function nb_answer($id_topic)
    {
        global $db;
        $q = $db->prepare("SELECT * FROM f_messages WHERE id_topic = ?");
        $q->execute([$id_topic]);
        $nb = $q->rowCount();

        return $nb;
    }

    function last_answer($id_topic){
        global $db;
        //Recuperer les derniers messages et les auteurs de ces messages
        $la = $db->prepare("SELECT * FROM f_messages WHERE id_topic = ? ORDER BY date_post DESC");
        $la->execute([$id_topic]);
        $la = $la->fetch(PDO::FETCH_OBJ);

        //On verifie si il ya pas de reponse
        if (nb_answer($id_topic) != 0){
            $resultat = $la->date_post." par ".get_pseudo($la->id_posteur);
            return $resultat;
        }else{
            return "Pas de reponse";
        }
    }

    function date_last_message($id_catego){
        global $db;

        $date = $db->prepare("SELECT * from f_topics LEFT JOIN f_topic_categorie ON
                                        f_topics.id = f_topic_categorie.id_topic LEFT JOIN f_categories
                                        ON f_topic_categorie.id_categorie = f_categories.id LEFT JOIN
                                        f_soucategories ON f_topic_categorie.id_souscategorie = f_soucategories.id
                                        LEFT JOIN f_users ON f_users.id = f_topics.id_createur
                                        WHERE f_categories.id = ? ORDER BY f_topics.date_creation DESC");
        $date->execute([$id_catego]);
        $date = $date->fetch(PDO::FETCH_OBJ);
        $resultat = $date->date_creation." par ".$date->pseudo;

        return $resultat;
    }