<?php
$stare = $_POST["stare"] ?? null;
$nove = $_POST["nove"] ?? null;
$znova = $_POST["znovu"] ?? null;
$changebtn = $_POST["changepassbtn"]??null;
$idadmin = $_SESSION["idadmin"] ?? null;
if(isset($changebtn)){
if ($stare == null || $nove == null || $znova == null) {
    $errorchange["err0"] = true;
} else {
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/", $nove)) {
        $errorchange["err1"] = true;
    }
    if ($nove != $znova) {
        $errorchange["err2"] = true;
    }

    if (empty($errorchange)) {
        $dotaz = $db->prepare("SELECT password FROM admin where idadmin=?");
        $dotaz->execute([$idadmin]);
        $data = $dotaz->fetch(PDO::FETCH_NAMED);



        $hash = $data["password"];

        if (password_verify($stare, $hash)) {
            include 'updatepassadmin.php';
           $success = updatepassword($nove, $idadmin, $db);
        } else {
            $errorchange["err3"] = true;
        }
    }
}
}