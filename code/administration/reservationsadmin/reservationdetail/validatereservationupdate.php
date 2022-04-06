<?php

$od = $_POST["datumod"] ?? null;
$do = $_POST["datumdo"] ?? null;
$vraceni = $_POST["datum_vraceni"] ?? null;
$vraceni == "" ? $vraceni = null : true;
isset($_POST["checkboxundo"]) ? $vraceni = null : null;
$provedeni = $reservation["date_of_reservation"];
$btn = $_POST["submit"] ?? null;
$idcar = $reservation["carid"];
$dnesnidatum = date("Y-m-d");
$idreservation = isset($_GET["id"]) ? (int)$_GET["id"] : NULL;



if (isset($btn)) {

    if ($od != null && $do != null) {
        if ($od < $provedeni) {
            $errarray["err1"] = true;
        }

        if ($do < $provedeni) {
            $errarray["err2"] = true;
        }
        if ($od > $do) {
            $errarray["err3"] = true;
        }
        if ($vraceni != null) {


            if ($vraceni < $od) {
                $errarray["err4"] = true;
            }
            if ($vraceni > date("Y-m-d")) {
                $errarray["err5"] = true;
            }
        }
        if (!isset($_POST["checkbox"])) {
            $errarray["err6"] = true;
        }
        if (empty($errarray)) {

            $dotaz = $db->prepare("SELECT idreservation, carid, start_date, end_date FROM
            reservation WHERE carid= ? AND ((? >= start_date and ? <= end_date)
            OR (? >= start_date and ? <= end_date)
            OR (? <= start_date and ? >=end_date))");
            $dotaz->execute([$idcar, $od, $od, $do, $do, $od, $do]);
            $reservationsdb = $dotaz->fetchAll(PDO::FETCH_ASSOC);


            if (!empty($reservationsdb)) {
                $i = 0;
                foreach ($reservationsdb as $reservationdb) {

                    if ($reservationdb["idreservation"] != $idreservation) {

                        $errarray["err7"] = true;
                    } else {

                        unset($reservationsdb[$i]);
                    }
                    $i++;
                }
            }


            if (empty($errarray)) {
                $validovano = true;
                include 'updatereservation.php';
            }
        }
    } else {
        $errarray["err0"] = true;
    }
}
$reservationsdb = $reservationsdb ?? [];
