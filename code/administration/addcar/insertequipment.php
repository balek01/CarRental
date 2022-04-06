<?php

if (!isset($vaidovanoequip)) {
    die;
}else{
if (empty($erreq1)) {
    


        $dotaz = $db->prepare("INSERT into equipment VALUES (?,?)");
        $dotaz->execute([
            0,
            $vybaveni1,
        ]);
    }

    
if (empty($erreq2)) {
    


    $dotaz = $db->prepare("INSERT into equipment VALUES (?,?)");
    $dotaz->execute([
        0,
        $vybaveni2,
    ]);
}

}

