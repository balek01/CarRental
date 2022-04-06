<?php

$iduser = isset($_SESSION["iduser"]) ? (int)$_SESSION["iduser"] : NULL;
if(!isset($iduser)){
    $iduser = isset($_GET["id"]) ? (int)$_GET["id"] :null;
}

if (isset($iduser)) {


    $dotaz = $db->prepare("SELECT * FROM user WHERE iduser=(?)");
    $dotaz->execute([$iduser]);
    $user = $dotaz->fetch(PDO::FETCH_ASSOC);
}

if (!empty($user)) {


    $dotaz = $db->prepare("SELECT * FROM user_address WHERE iduser_address=(?)");
    $dotaz->execute([$user["user_address_id"]]);
    $address = $dotaz->fetch(PDO::FETCH_ASSOC);

  
}
$address = $address ?? null;