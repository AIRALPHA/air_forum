<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_name = "Forum";
    $db_password = "root";

    try
    {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
        die ("Erreur : ". $e->getMessage());
    }