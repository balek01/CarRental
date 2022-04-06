<?php
$submit2 = $_POST["submitadmin"] ?? null;
$jmeno = $_POST["adminname"] ?? null;
$heslo = $_POST["password"] ?? null;
$heslo2 = $_POST["password2"] ?? null;



if (isset($submit2)) {
    if ($jmeno!=null && $heslo!=null && $heslo2!=null) {
        if ($heslo == $heslo2) {

            $dotaz = $db->prepare("SELECT idadmin FROM admin where username=?");
            $dotaz->execute([$jmeno]);
            $admin = $dotaz->fetch(PDO::FETCH_ASSOC);

            if (empty($admin)) {
                $heslo = password_hash(trim($heslo), PASSWORD_BCRYPT);
                $dotaz = $db->prepare("INSERT into admin (username, rights, password) VALUES (?, ?, ?)");
                $dotaz->execute([$jmeno, 0, $heslo]);
                $successaddadmin = true;
            } else {

                $error["err1"] = true;
            }
        } else {
            $error["err2"] = true;
        }
    } else {
        $error["err0"] = true;
    }
}
