<?php



include "../../assets/php/dbconnect.php";

$id = array_keys($_POST);

    $dotaz = $db->prepare("SELECT description FROM car WHERE idcar=(?)");
    $dotaz->execute([$id[0]]);
    $description = $dotaz->fetch(PDO::FETCH_ASSOC);

echo(json_encode($description));
 ?>