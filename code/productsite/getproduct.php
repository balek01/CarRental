<?php



$iduser = isset($_SESSION["iduser"]) ? (int)$_SESSION["iduser"] : NULL;
$idcar = isset($_GET["id"]) ? (int)$_GET["id"] : NULL;

if (isset($idcar)) {


    $dotaz = $db->prepare("SELECT car.*, ROUND(AVG(stars), 1) as stars FROM car
    LEFT JOIN rating on rating.car_id=car.idcar
     WHERE car.idcar=(?)");
    $dotaz->execute([$idcar]);
    $vozidlo = $dotaz->fetch(PDO::FETCH_ASSOC);

}

if (!empty($vozidlo)) {


    $dotaz = $db->prepare("SELECT equipment.equipment_name FROM equipment
                           JOIN car_has_equipment ON car_has_equipment.id_equipment = equipment.id
                           WHERE car_has_equipment.id_car = ?");
    $dotaz->execute([$idcar]);
    $dbvybaveni = $dotaz->fetchAll(PDO::FETCH_ASSOC);
    $vybaveniauta[]="!.ú.¨ú.úůůů¨úů¨ú.¨¨ú.).pú.).p.p.)";
    $vybaveniauta[]="!.ú.¨ú.úůůů¨úů¨ú.¨¨ú.).pú.).p.p.)";
foreach ($dbvybaveni as $value) {
  
  $vybaveniauta[]=$value["equipment_name"];
}
    $vybaveni = null;
    for ($i =0; $i<sizeof($dbvybaveni); $i++) {
        if($i!=0){
            $vybaveni = $vybaveni . ", " . str_replace("_"," ",$dbvybaveni[$i]["equipment_name"]);
        }else{
            $vybaveni = $vybaveni . str_replace("_"," ",$dbvybaveni[$i]["equipment_name"]);
        }
       
    }

   
}

$id = $vozidlo["idcar"] ?? null;
$znacka = $vozidlo["brand"] ?? null;
$model = $vozidlo["model"] ?? null;
$popis = $vozidlo["description"] ?? null;
$palivo = $vozidlo["fuel"] ?? null;
$cena = $vozidlo["price"] ?? null;
$mista = $vozidlo["seat"] ?? null;
$razeni = $vozidlo["gearing"] ?? null;
$dostupne = $vozidlo["available"] ?? null;
$obrazek = $vozidlo["img"] ?? null;
$spz = $vozidlo["license_plate"] ?? null;
$hodnoceni = $vozidlo["stars"] ?? null;
$vybaveni = $vybaveni ?? null;

