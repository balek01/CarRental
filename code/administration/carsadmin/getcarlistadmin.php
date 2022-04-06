<?php

include "../../assets/php/dbconnect.php";


$dotaz = $db->prepare("SELECT car.*, COALESCE(ROUND(AVG(stars), 1),'0') as stars FROM car
LEFT JOIN rating on rating.car_id=car.idcar
GROUP BY car.idcar");
$dotaz->execute();
$vozidla = $dotaz->fetchAll(PDO::FETCH_ASSOC);

