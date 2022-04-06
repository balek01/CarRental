<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["iduser"])) {

    header("Location: /", true, 301);
} else {
   include '../assets/php/dbconnect.php';
    include '../administration/usersadmin/userdetail/getuserdetail.php';
    include 'validateupdate.php';
    include '../html_include/top.phtml';
    include 'fetchprofile.phtml';
    echo (file_get_contents("../html_include/bot.html"));
}
