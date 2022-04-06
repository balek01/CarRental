<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
} else {

    include '../administrationbar.phtml';
    include 'getcarlistadmin.php';
    include 'carlistadmin.phtml';
    include '../administrationbot.html';
}
