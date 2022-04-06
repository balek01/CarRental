
<?php

!defined("DB_HOST") ? define('DB_HOST', 'db.mp.spse-net.cz') : false;
!defined("DB_USER") ? define('DB_USER', 'balekmi') : false;
!defined("DB_PASS") ? define('DB_PASS', 'talovyzegyla') : false;
!defined("DB_NAME") ? define('DB_NAME', 'balekmi_1') : false;

try {


    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
