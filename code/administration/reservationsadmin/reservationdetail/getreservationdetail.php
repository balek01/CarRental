<?php

$idreservation = isset($_GET["id"]) ? (int)$_GET["id"] : NULL;

if (isset($idreservation)) {


    $dotaz = $db->prepare("SELECT reservation.*, car.brand, car.model, car.price, user.iduser, user.firstname, user.lastname FROM reservation
     LEFT JOIN car ON reservation.carid = car.idcar
     LEFT JOIN user ON reservation.user_id=user.iduser 
     WHERE idreservation=(?)");
    $dotaz->execute([$idreservation]);
    $reservation = $dotaz->fetch(PDO::FETCH_ASSOC);
}

