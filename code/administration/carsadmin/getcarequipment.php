<?php

include "../../assets/php/dbconnect.php";

$id = array_keys($_POST);




    $dotaz = $db->prepare("SELECT equipment.equipment_name FROM equipment
                           JOIN car_has_equipment ON car_has_equipment.id_equipment = equipment.id
                           WHERE car_has_equipment.id_car = ?");
    $dotaz->execute([$id[0]]);
    $dbvybaveni = $dotaz->fetchAll(PDO::FETCH_ASSOC);

 
    $vybaveni = "";
    foreach ($dbvybaveni as $prvek) {
        $vybaveni = $vybaveni . " " . $prvek["equipment_name"];
        
    }


echo(json_encode($vybaveni));