<?php

function updatepassword($nove, $iduser, $db)
{
    $heslo = password_hash(trim($nove), PASSWORD_BCRYPT);
    $dotaz = $db->prepare("UPDATE user SET password=? WHERE iduser=?");
    $dotaz->execute([$heslo, $iduser]);
   return true;
}
