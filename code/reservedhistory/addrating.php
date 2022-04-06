<?php

include '../assets/php/dbconnect.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$iduser = $_SESSION["iduser"] ?? null;



$idcar = $_POST["id"] ?? null;
$stars = $_POST["star"]?? null;

$datum = date("Y-m-d");
is_numeric($idcar)? $val = true: $val=false;
preg_match("/^[1-5]$/",$stars)? true : $val=false;

if (isset($_SESSION["iduser"]) && $val==true) {
    $dotaz = $db->prepare("SELECT idreservation FROM reservation WHERE carid=? AND user_id=?");
    $dotaz->execute([$idcar, $iduser]);
    $vypujceno = $dotaz->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($vypujceno)) {
        $dotaz = $db->prepare("SELECT idrating FROM rating WHERE car_id=? AND user_id=?");
       $dotaz->execute([$idcar, $iduser]);
       $hodnoceno = $dotaz->fetchAll(PDO::FETCH_ASSOC);

        if (empty($hodnoceno)) {
            $dotaz = $db->prepare("INSERT INTO rating (stars , rating_date, car_id, user_id) VALUES (?,?,?,?) ");
            $dotaz->execute([
                $stars,
                $datum,
                $idcar,
                $iduser
            ]);

        }
    }
}
