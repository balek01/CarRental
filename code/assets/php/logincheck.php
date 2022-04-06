<?php

if (isset($_SESSION["iduser"])) {
    $useriddb = $db->prepare("SELECT iduser FROM user WHERE iduser=? LIMIT 1");
    $useriddb ->execute([$_SESSION["iduser"]]);
    $useriddb  = $useriddb ->fetchAll(PDO::FETCH_ASSOC);

    if (sizeof($useriddb ) === 0) {
        include 'logout.php';
        die;
    }

    $useriddb  = $useriddb [0];

    $_SESSION["iduser"] != (int)$useriddb ["iduser"] ? include 'logout.php' : false;
}
