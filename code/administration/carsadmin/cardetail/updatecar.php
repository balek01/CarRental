<?php
if (!isset($validovano)) {
  die;
}else{
$folder = "../../../assets/img/";


$idcar= $_GET["id"] ?? null;

try {
  

  move_uploaded_file($_FILES["imginput"]["tmp_name"], $fullpath);
  isset($_POST["dostupnost"]) ? $dostupnost = 1 :  $dostupnost = 0;

  $dotaz = $db->prepare("UPDATE car SET brand=?, model=?, description=?, fuel=?, price=?,seat=?, gearing=?, img=?, available=?, license_plate=? where idcar=?");
  $dotaz->execute([
    htmlspecialchars(trim($znackapost)),
    htmlspecialchars(trim($modelpost)),
    trim($popispost),
    htmlspecialchars(strtolower(trim($pohonpost))),
    $cenapost,
    $mistapost,
    $razenipost,
    $fullpath,
    $dostupnost,
    $spzpost,
    $idcar
  ]);

  $dotaz = $db->prepare("DELETE FROM car_has_equipment WHERE id_car=?;");
  $dotaz->execute([$idcar]);


  $dotaz = $db->prepare("SELECT ID, equipment_name FROM equipment;");
  $dotaz->execute();
  $dotaz = $dotaz->fetchAll(PDO::FETCH_ASSOC);
  $equipmentcar = array();


  foreach ($dotaz as $equip) {
    foreach ($_POST as $post => $hodnota) {
      if ($post === $equip["equipment_name"]) {
        $equipmentcar[] = $equip["ID"];
      }
    }
  }


  foreach ($equipmentcar as $equipmentid) {

    $dotaz = $db->prepare("INSERT into car_has_equipment VALUES (?,?,?)");
    $dotaz->execute([
      0,
      $idcar,
      $equipmentid
    ]);
  }

  header("Location: /admin/vozidla/detail_vozidla?id=" . $idcar);
} catch (Exception $e) {
  echo ("Vyskytla se chyba: <br><error>" . $e . "</error>");
}
}