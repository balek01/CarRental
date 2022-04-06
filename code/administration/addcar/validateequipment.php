<?php

$submit2 = $_POST["submit2"] ?? null;



if (isset($submit2)) {

    $vybaveni1 = trim($_POST["vybaveni1"]);
    if ($_POST["vybaveni1"] != "") {


        if (!preg_match("/^(([a-ž]|[A-Ž])[ ]*)+$/", $vybaveni1)) {
            $erreq1["0"] = true;
        }
        if (!preg_match('/^\S+$/', $vybaveni1)) {
            $erreq1["1"] = true;
        }
    }else{
        $erreq1["2"] = true;
    }


    $vybaveni2 = trim($_POST["vybaveni2"]);
    if ($_POST["vybaveni2"] != "") {


        if (!preg_match("/^(([a-ž]|[A-Ž])[ ]*)+$/", $vybaveni2)) {
            $erreq2["0"] = true;
        }
        if (!preg_match('/^\S+$/', $vybaveni2)) {
            $erreq2["1"] = true;
        }
    }else{
        $erreq2["2"] = true;
    }

  
    if (empty($erreq1) || empty($erreq2)) {
        $validodovanoequip = true;
        include 'insertequipment.php';
    }
}
