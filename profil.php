<?php
session_start();
//Inclusion des fichiers importants
require('filters/guest.php');
require_once ('functions/constants.php');
require_once('functions/database.php');
require_once ('functions/functions.php');

$q = $db->prepare("SELECT * FROM f_users WHERE id = ?");
$q->execute([$_SESSION['id']]);
$results = $q->fetch(PDO::FETCH_OBJ);

if(isset($_POST['submit_profil']))
{
    extract($_POST);

    $q = $db->prepare("UPDATE f_users SET pseudo = :pseudo, email = :email,
                      sexe = :sexe, date_nais = :date_nais, about_you = :description WHERE id = :id_c");
    //    $id = (int)$_SESSION['id'];
    $q->execute([
        "pseudo" => $pseudo,
        "email" => $email,
        "sexe" => $sexe,
        "date_nais" => $date,
        "description" => $description,
        "id_c" => $_SESSION['id'],
    ]);
    //On redirige
    redirection("profil.php");
}

if (isset($_POST['submit_pass']))
{
    extract($_POST);
    //Recuperation du vrai mot de passe en bd
    $pass = $db->prepare("SELECT password FROM f_users WHERE id = ?");
    $pass->execute([$_SESSION['id']]);
    $pass = $pass->fetch(PDO::FETCH_OBJ);

    $password = sha1($password);
    if($password == $pass->password)
    {
        if ($new_password == $new_password_confirm)
        {
            $q = $db->prepare("UPDATE f_users SET password = :password WHERE id = :id_c");
            $q->execute([
                "password" => sha1($new_password),
                "id_c" => $_SESSION['id'],
            ]);
        }else{
            die("Password non identique");
        }
    }else{
        die("Ancien mot de passe incorecte");
    }
}

if(isset($_POST['submit_img']))
{
    $photo_nom = $_FILES['photo']['name'];
    $photo_src = $_FILES['photo']['tmp_name'];

    if (!empty($photo_nom))
    {
        $photo_ext = strtolower(strrchr($photo_nom, "."));
        $ext_ok = ['.png', '.jpg', '.jpeg', '.jif'];
        if (in_array($photo_ext, $ext_ok))
        {
            move_uploaded_file($photo_src, "assets/img/".$photo_nom);
            $q = $db->prepare("UPDATE f_users SET avatar = :avatar WHERE id = :id_c");
            $q->execute([
                "avatar" => $photo_nom,
                "id_c" => $_SESSION['id'],
            ]);
            redirection("profil.php");
        }

    }

}

?>

<?php require ('views/profil.view.php'); ?>
