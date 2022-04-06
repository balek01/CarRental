<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["idadmin"])) {
    header("Location: /admin", true, 301);
} else {

include '../administrationbar.phtml';
include 'getuserlistadmin.php';
include 'userlistadmin.phtml';
include '../administrationbot.html';
}