<?php



if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
} else {
include "../../assets/php/dbconnect.php";

$id = array_keys($_POST);

    $dotaz = $db->prepare("SELECT * FROM user_address WHERE iduser_address=?;");
    $dotaz->execute([$id[0]]);
    $address = $dotaz->fetch(PDO::FETCH_ASSOC);

echo(json_encode($address));
 
}
