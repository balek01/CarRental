<?php

function validatereservation($idcar, $db)
{

    include 'insertreserve.php';



    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $od = $_POST["datumod"] ?? null;
    $do = $_POST["datumdo"] ?? null;
    $dnesnidatum = date("Y-m-d");
    $errres = $errres ?? null;
    $reservations = $reservations ?? null;
    $successreserve=null;

    if (isset($idcar) && isset($_SESSION["iduser"]) && isset($_POST["datumod"]) && isset($_POST["datumdo"])) {

        if ($do > $od &&  $od >= $dnesnidatum && $do >= $dnesnidatum) {



            $dotaz = $db->prepare("SELECT carid, start_date, end_date FROM reservation WHERE carid= ? AND ((? >= start_date and ? <= end_date)
            OR (? >= start_date and ? <= end_date)
            OR (? <= start_date and ? >=end_date))");
            $dotaz->execute([$idcar, $od, $od, $do, $do, $od, $do]);
            $reservations = $dotaz->fetchAll(PDO::FETCH_ASSOC);


            $datediff = strtotime($do) - strtotime($od);
            $datediff = $datediff /(60 * 60 *24);
       
            $datediff > 14 ? $errres[2] = true : null;
            if (empty($reservations)) {

                $dotaz = $db->prepare("SELECT price FROM car WHERE idcar= (?)");
                $dotaz->execute([$idcar]);
                $price = $dotaz->fetch(PDO::FETCH_ASSOC);



                $cost = $datediff * $price["price"];
                if(empty($errres)){
               $successreserve= addreservation($od, $do, $db, $idcar, $cost);
            }
            } else {
                $errres[0] = true;
            }
        }
    } else {

        $errres[1] = true;
    }
    return array($errres, $reservations,$successreserve);
}
