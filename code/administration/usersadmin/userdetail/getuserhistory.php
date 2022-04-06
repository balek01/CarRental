<?php

if (isset($_GET["id"])) {
    

    $userid = $_GET["id"];
    $dotaz = $db->prepare("SELECT reservation.*, car.brand, car.model FROM reservation
    LEFT JOIN car ON reservation.carid = car.idcar
    WHERE `user_id`=(?)
    ");
    $dotaz->execute([$userid]);
    $reservations = $dotaz->fetchAll(PDO::FETCH_ASSOC);


    
    
} 
?>