<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
    die;
} else {
    include "../../assets/php/dbconnect.php";
    include '../administrationbar.phtml';
    include 'validateupdatepassadmin.php';
    include 'changepassadmin.phtml';
    include '../administrationbot.html';
}
