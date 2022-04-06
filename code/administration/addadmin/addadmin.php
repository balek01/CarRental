<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"]) || $_SESSION["prava"] != 1) {
    header("Location: /admin", true, 301);
    die;
} else {
    include "../../assets/php/dbconnect.php";
    include '../administrationbar.phtml';
    include 'insertadmin.php';
    include 'addadmin.phtml';
    include '../administrationbot.html';
}
