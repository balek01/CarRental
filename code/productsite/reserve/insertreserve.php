<?php

function addreservation($od, $do, $db, $idcar, $cost)
{

    $dnesnidatum = date("Y-m-d H:i:s");


    $dotaz = $db->prepare("INSERT into reservation VALUES (?,?,?,?,?,?,?,?)");
    $dotaz->execute([
        0,
        $dnesnidatum,
        $od,
        $do,
        null,
        $_SESSION["iduser"],
        $idcar,
        $cost
    ]);

return true;
}

    ?>