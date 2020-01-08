<?php

    if (isset($_SESSION['id'])){
        header("Location:profil.php");
        exit();
    }

?>