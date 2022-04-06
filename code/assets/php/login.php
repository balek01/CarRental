<?php


include 'dbconnect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$btnsubmit = $_POST["btnid"] ?? null;

if (isset($btnsubmit)) {



    $emaillogin = $_POST["email-login"] ?? null;

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dotaz = $db->prepare("SELECT iduser, password FROM user WHERE email=(?)");
    $dotaz->execute([$emaillogin]);

    $data = $dotaz->fetch(PDO::FETCH_NAMED);



    $iduser = $data["iduser"];
    $hash = $data["password"];

    if (password_verify(trim($_POST["password-login"]), $hash)) {

        $_SESSION["iduser"] = $iduser;
      
        $errlog = true;
        echo (json_encode($errlog));
    } else {
        $errlog = false;
        session_destroy();
        echo (json_encode($errlog));
    }
} else {
    die;
}
