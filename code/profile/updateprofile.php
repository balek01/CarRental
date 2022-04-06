<?php

  

$tel = preg_replace('/\s+/', '', $_POST["tel"]);  
$cp =preg_replace('/\s+/', '', $_POST["cp"]);
$psc =preg_replace('/\s+/', '', $_POST["psc"]);


try {
    
    $updateuser = $db->prepare("UPDATE user SET email=?, phonenumber=? WHERE iduser=?");
    $updateuser->execute([
        htmlspecialchars(trim($_POST["email"])),
        htmlspecialchars(trim($tel)),
        $user["iduser"]

    ]);

    $updateaddress = $db->prepare("UPDATE user_address SET street=?, house_number=?, city=?, postcode=? WHERE iduser_address=?");
    $updateaddress->execute([
        htmlspecialchars(strtolower(trim($_POST["ulice"]))),
        htmlspecialchars(strtolower(trim($cp))),
        htmlspecialchars(strtolower(trim($_POST["obec"]))),
        htmlspecialchars(trim($psc)),
        $user["user_address_id"]

    ]);
$successupdateprofile=true;
} catch (Throwable $th) {

}
