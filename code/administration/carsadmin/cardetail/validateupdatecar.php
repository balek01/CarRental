<?php

$znackapost = $_POST["znacka"] ?? null;
$modelpost = $_POST["model"] ?? null;
$pohonpost = $_POST["pohon"] ?? null;
$razenipost = $_POST["razeni"] ?? null;
$mistapost = $_POST["mista"] ?? null;
$popispost = $_POST["description"] ?? null;
$cenapost = $_POST["cena"] ?? null;
$submit1 = $_POST["submit1"] ?? null;
$spzpost = $_POST["spz"] ?? null;
$err = [];





if (isset($submit1)) {

    if ($znackapost != null && $modelpost != null && $pohonpost = "*" && $razenipost != "*" && $mistapost != null && $popispost != null && $cenapost != null && $spzpost != null) {
        $err = null;

        if ($_FILES["imginput"]["name"] != "") {

            $folder = "/assets/img/";
            $fullpath = "../../". $folder . basename($_FILES["imginput"]["name"]);



            $filetype = strtolower(pathinfo($fullpath, PATHINFO_EXTENSION));

            // Je to opravdu obrázek


            if (!getimagesize($_FILES["imginput"]["tmp_name"])) {
                $err["errimg0"] = true;
            }

            // Neexistuje už
            if (file_exists($fullpath)) {

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
        } else {
            $obrdb = $db->prepare("SELECT img FROM car WHERE idcar=?");
            $obrdb->execute([$idcar]);
            $obrdb = $obrdb->fetch(PDO::FETCH_ASSOC);
            $obrazek = $obrdb["img"];
        
            $fullpath = $obrazek;
        }

        if (!preg_match("/^[0-9]+$/", $mistapost)) {
            $err["errinp0"] = true;
        }
        if (!preg_match("/^[0-9]+$/", $cenapost)) {
            $err["errinp1"] = true;
        }
        $spzpost = strtoupper(preg_replace("/\s+/", "", $spzpost));
        $spzdp = $db->prepare("SELECT idcar FROM car WHERE license_plate = (?)");
        $spzdp->execute([$spzpost]);
        $spzdp = $spzdp->fetch(PDO::FETCH_ASSOC);

        if ($spzdp["idcar"] != $idcar) {
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
            $validovano=true;
        include 'updatecar.php';
        }
    } else {

        $err["err0"] = true;
    }
}
