<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../assets/php/dbconnect.php';



if (isset($_SESSION["iduser"])) {
    
    $iduser = $_SESSION["iduser"];
   
    $dotaz = $db->prepare("SELECT reservation.*, car.brand, car.model, rating.stars FROM reservation
    LEFT JOIN car ON reservation.carid = car.idcar
    LEFT JOIN rating ON reservation.carid=rating.car_id AND reservation.user_id=rating.user_id
    WHERE reservation.user_id=?");

   $dotaz->execute([$iduser]);
   $reservations = $dotaz->fetchAll(PDO::FETCH_ASSOC);
   


} else {

    header("Location: /", true, 301);
}
    
