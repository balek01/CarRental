<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["idadmin"])) {

    header("Location: /admin", true, 301);
} else {
    include '../../../assets/php/dbconnect.php';
    include 'getreservationdetail.php';
    include 'validatereservationupdate.php';
    include '../../administrationbar.phtml';
    include 'fetchreservationdetail.phtml';

    echo (file_get_contents("../../administrationbot.html"));
}