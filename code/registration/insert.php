<?php

if (empty($_POST) || !isset($validovano)) {
    header("Location: /");
    die;
}

include '../assets/php/dbconnect.php';



$datum = $_POST["datum"];

$datumarr = explode(".", $datum);
$datum = $datumarr[2] . "-" . $datumarr[1] . "-" . $datumarr[0];
$datum = date("Y.m.d", strtotime($datum));
$tel = preg_replace('/\s+/', '', $_POST["tel"]);
$cp = preg_replace('/\s+/', '', $_POST["cp"]);
$psc = preg_replace('/\s+/', '', $_POST["psc"]);

if (!empty($_POST)) {


    try {


        $dotaz = $db->prepare("INSERT into user_address VALUES (?,?,?,?,?)");
        $dotaz->execute([
            0,
            htmlspecialchars(strtolower(trim($_POST["ulice"]))),
            htmlspecialchars(strtolower(trim($cp))),
            htmlspecialchars(strtolower(trim($_POST["obec"]))),
            htmlspecialchars(trim($psc))
        ]);



        $addressid = $db->lastInsertId();
        $heslo = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);

        $dotaz = $db->prepare("INSERT into user VALUES (?,?,?,?,?,?,?,?)");
        $dotaz->execute([
            0,
            $heslo,
            htmlspecialchars(trim($_POST["email"])),
            htmlspecialchars(strtolower(trim($_POST["jmeno"]))),
            htmlspecialchars(strtolower(trim($_POST["prijmeni"]))),
            htmlspecialchars(trim($tel)),
            htmlspecialchars(trim($datum)),
            $addressid
        ]);

   
    } catch (Exception $e) {
        echo ("Vyskytla se chyba: <br><error>" . $e . "</error>");
    }
   
}
