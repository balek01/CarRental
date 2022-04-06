<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($validovano)) {
    die;
}else{
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
    die;
} else {

$dotaz = $db->prepare("SELECT price FROM car WHERE idcar= (?)");
$dotaz->execute([$idcar]);
$price = $dotaz->fetch(PDO::FETCH_ASSOC);


$datediff = strtotime($do) - strtotime($od);
$cost = $datediff / (60 * 60 * 24) * $price["price"];


$updatereservation = $db->prepare("UPDATE reservation set start_date = ?, end_date=?, return_date=?, cost=? WHERE idreservation=?");
$updatereservation->execute([$od,$do,$vraceni,$cost,$idreservation]);
$success = true;
header("Location: /admin/rezervace/detail_rezervace?id=".$idreservation);
}}