<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"]) || $_SESSION["prava"] != 1) {
   header("Location: /admin", true, 301);
} else {
    include "../../assets/php/dbconnect.php";
    include '../administrationbar.phtml';
    include 'getadminlist.php';
    include 'adminlist.phtml';
    include '../administrationbot.html';
}
