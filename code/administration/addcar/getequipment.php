<?php



$dotaz = $db->prepare("SELECT equipment_name FROM equipment");
$dotaz->execute();
$equipment = $dotaz->fetchAll(PDO::FETCH_ASSOC);