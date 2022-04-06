<?php

include '../assets/php/dbconnect.php';

if (!empty($_POST)) {


  $mista = explode("-", $_POST["mista"]);

  if (!isset($mista[1])) {
    $mista[1] = "*";
  }

  $promenne = [];

  $cenaod = $_POST["cenaod"] == "" ? "*" : $_POST["cenaod"];
  $cenado = $_POST["cenado"] == "" ? "*" : $_POST["cenado"];

  $sql = "SELECT * FROM car WHERE available!='2'";

  if ($_POST["pohon"] != "*") {
    $sql .= " AND fuel =?";
    $promenne[] = $_POST["pohon"];
  }

  if ($_POST["razeni"] != "*") {
    $sql .= " AND gearing =?";
    $promenne[] = $_POST["razeni"];
  }

  if ($cenaod != "*") {
    $sql .= " AND price >= ?";
    $promenne[] = $cenaod;
  }
  if ($cenado != "*") {
    $sql .= " AND price <= ?";
    $promenne[] = $cenado;
  }
  if ($mista[0] != "*") {
    $sql .= " AND seat >= ?";
    $promenne[] = $mista[0];
  }
  if ($mista[1] != "*") {
    $sql .= " AND seat <= ?";
    $promenne[] = $mista[1];
  }



  $dotaz = $db->prepare($sql . " ORDER BY available desc");
  $dotaz->execute($promenne);
  $auta = $dotaz->fetchall(PDO::FETCH_ASSOC);

 
} else {

  $dotaz = $db->prepare("SELECT * FROM car WHERE available!='2' ORDER BY available desc");
  $dotaz->execute([]);
  $auta = $dotaz->fetchall(PDO::FETCH_ASSOC);
}
