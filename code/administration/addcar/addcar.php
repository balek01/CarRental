
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
} else {
    include '../../assets/php/dbconnect.php';
    include 'validateupload.php';
    include 'validateequipment.php';
    include 'getequipment.php';
    include '../administrationbar.phtml';
    include 'addcarbody.phtml';
    include '../administrationbot.html';
}

