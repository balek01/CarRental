<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["idadmin"])) {

    header("Location: /admin", true, 301);
    die;
} else {
    include '../../../assets/php/dbconnect.php';
    include '../../addcar/getequipment.php';
    include '../../../productsite/getproduct.php';

    include '../../addcar/validateequipment.php';
    include 'validateupdatecar.php';
    include '../../administrationbar.phtml';
    include 'fetchcardetail.phtml';
    echo (file_get_contents("../../administrationbot.html"));
}
