<?php
    define("WEBSITE_NAME", "AIR ALPHA");
    $smtp_port = "1025";
    $smtp = $_SERVER["HTTP_HOST"];
    ini_set("smtp_port", $smtp_port);
    ini_set("smtp", $smtp);

