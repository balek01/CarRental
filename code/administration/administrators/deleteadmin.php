<?php

include '../../assets/php/dbconnect.php';



if (!empty($_POST)) {
    $id = array_keys($_POST);
    $dotaz=$db->prepare("SELECT rights FROM admin where idadmin=?");
    $dotaz->execute([$id[0]]);
    $prava=$dotaz->fetch(PDO::FETCH_ASSOC);
 
    if ($prava["rights"]!=1) {
        $dotaz=$db->prepare("DELETE FROM admin where idadmin=?");
        $dotaz->execute([$id[0]]);
    }else{
        $erradmindel = true;
        echo($erradmindel);
        }
}
