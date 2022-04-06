<?php

include '../../assets/php/dbconnect.php';


$id = array_keys($_POST);
if (!empty($_POST)) {
    


$dotaz=$db->prepare("SELECT available FROM car WHERE idcar=?");
$dotaz->execute([$id[0]]);
$availabledb=$dotaz->fetch(PDO::FETCH_ASSOC);


if($availabledb["available"]==2){

$dotaz=$db->prepare("UPDATE car SET available='0' WHERE idcar=?");
$dotaz->execute([$id[0]]);

}else{


$dotaz=$db->prepare("UPDATE car SET available='2' WHERE idcar=?");
$dotaz->execute([$id[0]]);
}
}