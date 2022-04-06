<?php

function updatepassword($nove, $idadmin, $db)
{
    $heslo = password_hash(trim($nove), PASSWORD_BCRYPT);
    $dotaz = $db->prepare("UPDATE admin SET password=? WHERE idadmin=?");
    $dotaz->execute([$heslo, $idadmin]);
   return true;
}
