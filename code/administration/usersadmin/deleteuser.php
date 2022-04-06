<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
} else {

    include '../../assets/php/dbconnect.php';
    $id = array_keys($_POST);

    $dotaz = $db->prepare("SELECT user_address_id from user WHERE iduser =?");
    $dotaz->execute([$id[0]]);
    $idaddress = $dotaz->fetch(PDO::FETCH_ASSOC);

    $dotaz = $db->prepare("DELETE from user WHERE iduser =?");
    $dotaz->execute([$id[0]]);

    $dotaz = $db->prepare("DELETE from user_address WHERE iduser_address =?");
    $dotaz->execute([$idaddress["user_address_id"]]);
}

