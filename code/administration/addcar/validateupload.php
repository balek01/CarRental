<?php

$znacka = $_POST["znacka"] ?? null;
$model = $_POST["model"] ?? null;
$pohon = $_POST["pohon"] ?? null;
$razeni = $_POST["razeni"] ?? null;
$mista = $_POST["mista"] ?? null;
$popis = $_POST["description"] ?? null;
$cena = $_POST["cena"] ?? null;
$submit1 = $_POST["submit1"] ?? null;
$spz = $_POST["spz"] ?? null;
$err = [];


clearstatcache();


if (isset($submit1)) {


  if ($znacka != null && $model != null && $pohon = "*" && $razeni != "*" && $mista != null && $popis != null && $cena != null && $spz != null && $_FILES["imginput"]["name"] != "") {
    $err = null;

    $folder = "/assets/img/";
    $fullpath = $folder . basename($_FILES["imginput"]["name"]);



    $filetype = strtolower(pathinfo($fullpath, PATHINFO_EXTENSION));

    // Je to opravdu obrázek


    if (!getimagesize($_FILES["imginput"]["tmp_name"])) {
      $err["errimg0"] = true;
    }

    // Neexistuje už
    if (file_exists("../../" . $fullpath)) {

      $err["errimg1"] = true;
    }
    // Velikost
    if ($_FILES["imginput"]["size"] > 500000) {
      $err["errimg2"] = true;
    }
    // Pouze vypsané formáty
    if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
      $err["errimg0"] = true;
    }

    //rozměry obrázku
    if (!empty($_FILES["imginput"]["tmp_name"])) {
      $size = getimagesize($_FILES["imginput"]["tmp_name"]);
      //povolené rozměry
      if ($size[0] != 1280 && $size[1] != 720) {
        $err["errimg3"] = true;
      }
    }

    if (!preg_match("/^[0-9]+$/", $mista)) {
      $err["errinp0"] = true;
    }
    if (!preg_match("/^[0-9]+$/", $cena)) {
      $err["errinp1"] = true;
    }
    $spz = strtoupper(preg_replace("/\s+/","",$spz));
    $spzdp = $db->prepare("SELECT idcar FROM car WHERE license_plate = (?)");
    $spzdp->execute([$spz]);
    $spzdp = $spzdp->fetch(PDO::FETCH_ASSOC);

    if (!empty($spzdp)) {
      $err["errinp3"] = true;
    }

    $fueldb = $db->prepare("SHOW COLUMNS FROM car WHERE Field = 'fuel'");
    $fueldb->execute([]);
    $fueldb = $fueldb->fetchAll(PDO::FETCH_ASSOC);
    $fueldb = $fueldb[0]["Type"];
    preg_match("/^enum\(\'(.*)\'\)$/", $fueldb, $matches);
    $fueldb = explode("','", $matches[1]);

    $err["errinp2"] = true;
    foreach ($fueldb as $value) {
      if ($_POST["pohon"] == $value) {
        unset($err["errinp2"]);
      }
    }


    $gearingdb = $db->prepare("SHOW COLUMNS FROM car WHERE Field = 'gearing'");
    $gearingdb->execute([]);
    $gearingdb = $gearingdb->fetchAll(PDO::FETCH_ASSOC);
    $gearingdb = $gearingdb[0]["Type"];
    preg_match("/^enum\(\'(.*)\'\)$/", $gearingdb, $shody);
    $gearingdb = explode("','", $shody[1]);

    $err["errinp2"] = true;
    foreach ($gearingdb as $value) {
      if ($_POST["razeni"] === $value) {
        unset($err["errinp2"]);
      }
    }

    if (empty($err)) {
      $validovanoupload=true;
      include 'insertcar.php';
    }
  } else {

    $err["err0"] = true;
  }
}
