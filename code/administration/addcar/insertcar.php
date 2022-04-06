<?php
if (!isset($validovanoupload)) {
  die;
}else{
$folder = "../../assets/img/";
$fullpath = $folder . basename($_FILES["imginput"]["name"]);



try {
  

  move_uploaded_file($_FILES["imginput"]["tmp_name"], $fullpath);
  isset($_POST["dostupnost"]) ? $dostupnost = 1 :  $dostupnost = 0;

  $dotaz = $db->prepare("INSERT into car VALUES (?,?,?,?,?,?,?,?,?,?,?)");
  $dotaz->execute([
    0,
    htmlspecialchars(strtolower(trim($znacka))),
    htmlspecialchars(strtolower(trim($model))),
    strtolower(trim($popis)),
    htmlspecialchars(strtolower(trim($pohon))),
    $cena,
    $mista,
    $razeni,
    $fullpath,
    $dostupnost,
    $spz
  ]);


  $carid = $db->lastInsertId();
  $dotaz = $db->prepare("SELECT ID, equipment_name FROM equipment;");
  $dotaz->execute();
  $dotaz = $dotaz->fetchAll(PDO::FETCH_ASSOC);
  $equipment = array();


  foreach ($dotaz as $equip) {
    foreach ($_POST as $post => $hodnota) {
      if ($post === $equip["equipment_name"]) {
        $equipment[] = $equip["ID"];
      }
    }
  }


  foreach ($equipment as $equipmentid) {
    $dotaz = $db->prepare("INSERT into car_has_equipment VALUES (?,?,?)");
    $dotaz->execute([
      0,
      $carid,
      $equipmentid["ID"]
    ]);
  }

  header("Location: /vozovy_park/vozidlo?id=" . $carid);
} catch (Exception $e) {
  echo ("Vyskytla se chyba: <br><error>" . $e . "</error>");
}
}