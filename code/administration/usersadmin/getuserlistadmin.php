<?php

include "../../assets/php/dbconnect.php";


    $dotaz = $db->prepare("SELECT * FROM user");
    $dotaz->execute();
    $users = $dotaz->fetchAll(PDO::FETCH_ASSOC);

   



