<?php





$dotaz = $db->prepare("SELECT reservation.*,user.firstname, user.lastname, car.brand, car.model FROM reservation
 LEFT JOIN user ON user.iduser= reservation.user_id
 LEFT JOIN car ON reservation.carid = car.idcar");
$dotaz->execute();
$reservations = $dotaz->fetchAll(PDO::FETCH_ASSOC);


