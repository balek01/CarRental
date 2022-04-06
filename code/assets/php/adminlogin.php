<?php

function adminlogin($username, $password)
{if (empty($_SESSION["idadmin"])) {
  date_default_timezone_set("Europe/Prague");
   
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include 'dbconnect.php';

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dotaz = $db->prepare("SELECT idadmin, password, rights FROM admin WHERE username=(?)");
    $dotaz->execute([$username]);

    $data = $dotaz->fetch(PDO::FETCH_NAMED);



    $idadmin = $data["idadmin"];
    $prava = $data["rights"];
    $hash = $data["password"];
   
    if (password_verify(trim($password), $hash)) {
        $datelog = date("Y-m-d H:i:s");
        $_SESSION["idadmin"] = $idadmin;
        $_SESSION["prava"] = $prava;
        $_SESSION["čas"] = $datelog;
        $dotaz=$db->prepare("UPDATE admin SET datelog=? WHERE idadmin=?");
        $dotaz->execute([$datelog,$idadmin]);
        header("Location: /admin");
    } else {
      
        $errlog = false;
        session_destroy();
    }
    $errlog = $errlog ?? null;
    
    return $errlog;
}
}
