<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
} else {

    include '../../assets/php/dbconnect.php';
    include '../administrationbar.phtml';
    include 'getreservation.php';
    include 'reservationbody.phtml';
    include '../administrationbot.html';
}

 