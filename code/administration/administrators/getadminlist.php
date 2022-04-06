<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"]) || $_SESSION["prava"] != 1) {
    die;
}else{
    
    $dotaz = $db->prepare("SELECT idadmin ,username, rights, datelog FROM admin");
    $dotaz->execute();
    $adminlist = $dotaz->fetchAll(PDO::FETCH_ASSOC);
}
